<?php
use App\User;
use App\Training;
use App\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactShipped;
use App\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/home', '/');

Auth::routes();

Route::get('/training', function () {
    return view('training');
})->name('training');

Route::get('/news', function () {
    $news = News::orderBy('created_at', 'desc')->get();
    $index = 0;
    return view('news', compact('news', 'index'));
})->name('news');

Route::post('/contact', function (Request $request) {
    $validatedInput = $request->validate([
        'name' => 'required',
        'email' => 'required:email',
        'message' => 'required'
    ]);
    foreach ($validatedInput as $key => $value) {
        $validatedInput[$key] = htmlspecialchars($value);
    }
    Mail::to('autoecoleuniversites@gmail.com')->send(new ContactShipped($validatedInput));
    Session::flash('sent_mail', 'Votre message a bel et bien été envoyé !');
    return redirect(url('/'));
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/course', function () {
        return view('course');
    })->name('course');

    Route::get('/profile', function () {
        $user = Auth::user();
        return view('profile', compact('user'));
    })->name('profile');

    Route::post('/profile', function (Request $request) {
        $user = Auth::user();
        $validatedInput = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:50',
            'new_password' => 'confirmed'
        ]);
        foreach ($validatedInput as $key => $value) {
            $validatedInput[$key] = htmlspecialchars($value);
        }
        if ($request->has('password')) {
            if (Hash::check($request->password, $user->password)) {
                $validatedInput['password'] = Hash::make($request->new_password);
            }
        }
        $user->update($validatedInput);
        Session::flash('edited_profile', 'Les paramètres de votre compte ont été édités.');
        return redirect(route('profile'));
    })->name('profile.store');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            $teachers = User::where('role_id', 3)->get();
            $students = User::where('role_id', 2)->get();
            $trainings = Training::all();
            $documents = Document::all();
            return view('admin.dashboard', compact('teachers', 'students', 'trainings', 'documents'));
        })->name('admin.dashboard');

        Route::name('admin.users.multi-delete')->delete('/admin/users/multi-delete', 'AdminUsersController@multiDelete');
        Route::name('admin')->resource('/admin/users', 'AdminUsersController');

        Route::name('admin.categories.documents.multi-delete')->delete('/admin/categories/documents/multi-delete', 'AdminCategoriesDocumentsController@multiDelete');
        Route::name('admin.categories')->resource('/admin/categories/documents', 'AdminCategoriesDocumentsController');

        Route::name('admin.categories.multi-delete')->delete('/admin/categories/multi-delete', 'AdminCategoriesController@multiDelete');
        Route::name('admin')->resource('/admin/categories', 'AdminCategoriesController');

        Route::name('admin.roles.multi-delete')->delete('/admin/roles/multi-delete', 'AdminRolesController@multiDelete');
        Route::name('admin')->resource('/admin/roles', 'AdminRolesController');

        Route::name('admin.trainings.multi-delete')->delete('/admin/trainings/multi-delete', 'AdminTrainingsController@multiDelete');
        Route::name('admin')->resource('/admin/trainings', 'AdminTrainingsController');

        Route::name('admin.news.multi-delete')->delete('/admin/news/multi-delete', 'AdminNewsController@multiDelete');
        Route::name('admin')->resource('/admin/news', 'AdminNewsController');
    });

    Route::middleware('student')->group(function () {
        Route::get('/student/dashboard', function () {
            $user = Auth::user();
            $sumProgress = 0;
            $sumRemaining = 0;
            $current = 0;
            $documentsArray = [];
            foreach ($user->trainings as $training) {
                $progress = Training::progress($training->id);
                $remaining = Training::remaining($training->id);
                $sumProgress += $progress;
                $sumRemaining += $remaining;
                if ($progress < 100) $current++;
                foreach ($training->category->documents as $document) {
                    if (!in_array($document->id, $documentsArray)) {
                        $documentsArray[] = $document->id;
                    }
                }
            }
            $documents = count($documentsArray);
            return view('student.dashboard', compact('user', 'sumProgress', 'sumRemaining', 'documents', 'current'));
        })->name('student.dashboard');
    });

    Route::middleware('teacher')->group(function () {
        Route::get('/teacher/dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');
    });

    Route::name('trainings.mine.show')->get('/trainings/mine/{training}', 'TrainingsController@showMine');
    Route::name('trainings.mine.index')->get('/trainings/mine', 'TrainingsController@mine');
    Route::name('trainings.show')->get('/trainings/{training}', 'TrainingsController@show');
    Route::name('trainings.index')->get('/trainings', 'TrainingsController@index');

    Route::name('monetbil.notify.post')->post('/monetbil/notify', 'MonetbilController@notify');
    Route::name('monetbil.notify.get')->get('/monetbil/notify', 'MonetbilController@notify');
});
