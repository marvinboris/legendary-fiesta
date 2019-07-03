<?php

namespace App\Http\Controllers;

use App\Category;
use App\Training;
use Illuminate\Support\Facades\Auth;
use App\Transaction;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $icons = ['icons8-motorcycle-48.png', 'icons8-car-501.png', 'icons8-container-truck-48.png', 'icons8-bus-64.png', 'icons8-semi-truck-64.png', 'icons8-bulldozer-64.png'];
        $count = 0;
        return view('trainings.index', compact('categories', 'icons', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $training = Training::findOrFail($id);
        $images = [
            'Permis A' => 'moto-senke-sk12513-125cc-color-negro-D_NQ_NP_761470-MLU25657572659_062017-F.jpg',
            'Permis B' => 'rav4.png',
            'Permis C' => 'mses1.jpg',
            'Permis D' => 'bus-2.png',
            'Permis E' => 'poids-lourd.png',
            'Permis G' => 'tractor-002.png',
        ];

        // Handling payments
        $user = Auth::user();

        $lastTransaction = Transaction::where('user_id', $user->id)->where('training_id', $training->id)->get()->first();

        if ($lastTransaction) if ($lastTransaction->status === 'completed') {
            return redirect(route('trainings.mine.show', $training->id));
        }

        $monetbil = MonetbilController::generateWidgetData([
            'amount' => $training->cost,
            'training_id' => $training->id
        ]);

        return view('trainings.show', compact('training', 'images', 'monetbil'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mine()
    {
        //
        $user = Auth::user();
        $images = [
            'Permis A' => 'moto-senke-sk12513-125cc-color-negro-D_NQ_NP_761470-MLU25657572659_062017-F.jpg',
            'Permis B' => 'rav4.png',
            'Permis C' => 'mses1.jpg',
            'Permis D' => 'bus-2.png',
            'Permis E' => 'poids-lourd.png',
            'Permis G' => 'tractor-002.png',
        ];
        return view('trainings.mine.index', compact('user', 'images'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMine($id)
    {
        //
        $user = Auth::user();
        $training = Training::findOrFail($id);
        $images = [
            'Permis A' => 'moto-senke-sk12513-125cc-color-negro-D_NQ_NP_761470-MLU25657572659_062017-F.jpg',
            'Permis B' => 'rav4.png',
            'Permis C' => 'mses1.jpg',
            'Permis D' => 'bus-2.png',
            'Permis E' => 'poids-lourd.png',
            'Permis G' => 'tractor-002.png',
        ];
        return view('trainings.mine.show', compact('user', 'images', 'training'));
    }
}
