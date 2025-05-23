<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use App\Models\Court;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\FutsalRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courts = Court::limit(3)->get();
        return view('index', compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // ----------------------------------------User Book Court----------------------------------------


    public function showBookCourt() {

        $courts = Court::paginate();
        return view('users.booking', compact('courts'));
    }

    // ----------------------------------------User LoginForm----------------------------------------


    public function showLoginForm() {
        return view('users.auth.login');
    }

    // ----------------------------------------User SignupForm----------------------------------------


    public function showSignupForm() {
        return view('users.auth.sign');
    }

    // ----------------------------------------User My Bookings----------------------------------------


    public function showMyBookings() {
        $user = Auth::user();
        // $bookings = Book::with(['court', 'user'])->get();
        // if ($user) {
        //     $bookings = Book::where('user_id', $user->id)->with(['court', 'user'])->get();
        // } else {
        //     $bookings = [];
        // }

        $bookings = Book::where('user_id', $user->id)->with('court')->get();
        return view('users.mybooking', compact('user', 'bookings'));
    }

    // ----------------------------------------User profile----------------------------------------


    public function showProfile() {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // ----------------------------------------User Dashboard----------------------------------------


    public function userDashboard() {

        $user = Auth::user();
        
        $totalBookings = Book::where('user_id', $user->id)->count();
        
        $upcomingBookings = Book::where('user_id', $user->id)->with('court')
                            ->where('time', '>=', now())
                            ->orderBy('date', 'asc')
                            ->get();

        return view('users.dashboard', compact('user', 'totalBookings', 'upcomingBookings'));
    }

    // ----------------------------------------User signup----------------------------------------


    public function register(FutsalRequest $request) {

        $user = User::create([
            'full_name'=> $request->input('full_name'),
            'email'=> $request->input('email'),
            'phone'=> $request->input('phone'),
            'password'=> Hash::make($request->input('password')),
            'terms'=> $request->input('terms'),
        ]);

        Auth::login($user);
        session()->flash('success', 'You have successfully logged in.');
        // return redirect()->route('login');
        return redirect()->route('userDashboard', $user->id);
    }   

    // ----------------------------------------User login----------------------------------------


    public function login(LoginRequest $request) {

        $credentials = $request->only('email', 'password');

        $remember = $request->filled('remember');
        
        if (Auth::attempt($credentials, $remember)) {
            // $request->session()->regenerate();

            return redirect()->route('userDashboard', Auth::user()->id)->with('success', 'You have successfully logged in.');
        } 
        else {
            return back()->withErrors([
                'error' => 'Email or password did not match.',
                ])->withInput();
        }
    }

    // ----------------------------------------User logout----------------------------------------


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ----------------------------------------Contact Form----------------------------------------


    public function contact(Request $request) 
    {
        $validated = $request->validate([
            'full_name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255',
            'phone'=> 'required|string|max:15',
            'subject'=> 'required',
            'message'=> 'required|string|max:1000'
        ]);
            Contact::create($validated);
            return redirect()->back(); 
    }
}