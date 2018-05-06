<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', ['urls' => Url::orderBy('hits', 'DESC')->get()]);
    }

    ##page not found
    public function page_not_found()
    {
         return view('404');
        
    }
}
