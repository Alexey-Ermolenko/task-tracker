<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class LandingController extends Controller
{
    /**
     * @return Renderable
     */
    public function landingPage(): Renderable
    {
        return view('layouts.landing');
    }
}
