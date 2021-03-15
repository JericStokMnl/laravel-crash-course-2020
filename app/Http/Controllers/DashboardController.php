<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()) {
            abort(403, 'Unauthorized damn it.');
        }
        return view('dashboard');
    }
}
