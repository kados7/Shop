<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view('home.profiles.index');
    }

    public function comments(){
        return view('home.profiles.comments');
    }

    public function wishlist(){
        return view('home.profiles.wishlist');
    }

    public function address(){
        return view('home.profiles.address');
    }

    public function orders(){
        return view('home.profiles.orders');
    }
}
