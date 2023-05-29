<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AppsController extends Controller
{

    public function index()
    {
        return Inertia::render('Apps');
    }
}
