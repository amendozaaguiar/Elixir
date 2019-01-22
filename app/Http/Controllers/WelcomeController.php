<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatorias;

class WelcomeController extends Controller
{
    public function index()
    {
        $convocatorias = Convocatorias::OrderBy('id','DESC')->paginate(10);
        return view('home',compact('convocatorias'));
    }
}
