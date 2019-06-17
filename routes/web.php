<?php
use App\User;
use App\Training;
use App\Document;
use Illuminate\Support\Facades\Auth;

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


Route::middleware('auth')->group(function () {
    Route::get('/course', function () {
        return view('course');
    })->name('course');

    Route::get('/profile', function () {
        $user = Auth::user();
        return view('profile', compact('user'));
    })->name('profile');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            $teachers = User::where('role_id', 2)->get();
            $students = User::where('role_id', 3)->get();
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
    });

    Route::middleware('student')->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');
        })->name('student.dashboard');
    });

    Route::middleware('teacher')->group(function () {
        Route::get('/teacher/dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');
    });
});
