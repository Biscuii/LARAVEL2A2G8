<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller
{
    public function publicView(){
        return view("publicView");
    }

    public function contact(){
        return view("pageOffline/contact");
    }
    public function help(){
        return view("pageOffline/help");
    }

    public function team(){
        return view("pageOffline/team");
    }

    public function owner(){
        return view("pageOffline/owner");
    }

    public function profil(){
        return view("pageConnected/profile");
    }
    public function favoris(){
        return view("pageConnected/favoris");
    }
    public function annonce(){
        return view("pageConnected/annonce");
    }
}
