<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('about');
        // যদি file থাকে: resources/views/about.blade.php
    }

   public function index()
    {
        return view('programs');
    }

   public function index()
    {
        return view('activities');
    }


     public function index()
    {
        return view('contact');
    }



}
