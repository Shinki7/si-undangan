<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
class FrontController extends Controller
{
    public function index(){
        $guest = Guest::paginate(10);
        return view('front.list', compact('guest'));
    }
    public function show($slug){
        $guest = Guest::where('slug', $slug)->first();
        return view('front.index', compact('guest'));
    }
}
