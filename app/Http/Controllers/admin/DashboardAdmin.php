<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\Prestataire;
use App\Http\Controllers\Controller;
use App\Models\BienImmobilier;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function numberUserAll(Request $request){
        $totalUser = User::count();
        //$activeUser = User::where('active', 1)->count(); de base c'était pour show user connected
        //$ongoingReservation = Reservation::where('status', 'en cours')->count();



        // gestion bien immo
        $activeBienImmo = BienImmobilier::count();


        return view('backOffice/administrateur/adminPanel', [
            'result'=> $totalUser,
            //'activeUser' => $activeUser,
            'activeBienImmo' => $activeBienImmo,
            //'ongoingReservation' => $ongoingReservation,
        ]);
    }


}
