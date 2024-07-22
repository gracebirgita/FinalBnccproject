<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{

    public function title()
    {
        $toys = Toy::take(10)->orderby('stock', 'asc')->get();
        return view('title', compact('toys')); //home
    }

    public function list()
    {
        $toys = Toy::paginate(6);
        return view('toys.index', compact('toys'));
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->email == 'admin@gmail.com') {
                return redirect('/admindashboard')->with('success', 'Login berhasil');
            }
            else {
                return redirect()->route('home')->with('success', 'Login berhasil');
            }
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
    }


    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }

    public function admin()
    {
        $toys= Toy::all();
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function userLogin(Request $request)
    // {
    //     if(Auth::attempt([
    //         "email" =>$request->email,
    //         "password" => $request->password,

    //     ]))
    //     {
    //         $request->session()->regenerate();

    //         if(Auth::user()->role == 'admin'){
    //             return redirect()->route('admin.home');
    //         }

    //         return redirect()->route('home');
    //     }
    //     return redirect()->back()->withErrors([
    //         "error" => "Invalid Credentials !"
    //     ]);
    // }

    // public function userRegister(Request $request)
    // {
    //     // dd($request->all());
    //     // cek password=confirm password
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|string|email|unique:users',
    //         'password' => 'required|string|confirmed'
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email'=>$request->email,
    //         'password'=> Hash::make($request->password),

    //     ]);


    //     return redirect()->route('login');
    // }

    // public function user_logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect()->route('home');
    // }

    public function search(Request $request)
    {

        $toys = Toy::where('name', 'like', "%" . $request->search . "%")->get();
        $categories = Category::all();

        if(Auth::user()->email == 'admin@gmail.com'){
            if ($toys->isEmpty()) {

                return view('admin.index', ['message' => 'No results found', 'toys' => [], 'categories' => $categories]);
            } else {

                return view('admin.index', ['toys' => $toys, 'categories' => $categories]);
            }
        } else {
            if ($toys->isEmpty()) {

                return view('title', ['message' => 'No results found', 'toys' => [], 'categories' => $categories]);
            } else {

                return view('title', ['toys' => $toys, 'categories' => $categories]);
            }
        }
    }

    public function filter(Category $category){
        if($category->id)
        {
            $toys = Toy::where('category_id', $category->id)->get();
        }
        else
        {
            $toys = Toy::all();
        }
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }
}
