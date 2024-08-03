<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $toys = Toy::all();
        return view('admin.index', compact('categories', 'toys'));
    }
}
