<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $latestUsers = User::latest()->take(5)->get();
            $latestImages = Image::with('user')->latest()->take(5)->get();

            $data = compact(['latestUsers', 'latestImages']);
            return view('layouts.partials.admin', $data);
        }else{
            $latestImages = Image::with('user')->latest()->take(10)->get();
            return view('home', compact('latestImages'));
        }
    }
}
