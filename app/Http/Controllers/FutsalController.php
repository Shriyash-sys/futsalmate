<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Court;
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
        return view('index');
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

    public function showBookCourt() {

        $courts = Court::paginate();
        return view('users.booking', compact('courts'));
    }

    public function showLoginForm() {
        return view('users.auth.login');
    }

    public function showSignupForm() {
        return view('users.auth.sign');
    }

    public function showMyBookings() {
        $user = Auth::user();
        $bookings = $user->bookings;
        return view('users.mybooking', compact('bookings'));
    }

    public function showProfile() {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function userDashboard() {

        $user = Auth::user();
        
        $totalBookings = Book::where('user_id', $user->id)->count();
        
        $upcomingBookings = Book::where('user_id', $user->id)
                            ->where('date', '>=', now())
                            ->orderBy('date', 'asc')
                            ->get();

        return view('users.dashboard', compact('user', 'totalBookings', 'upcomingBookings'));
    }

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
        return redirect()->route('login');
    }

    public function login(LoginRequest $request) {

        // dd($request->remember);

        $credentials = $request->only('email', 'password');

        // $remember = $request->filled('remember');
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('userDashboard', Auth::user()->id)->with('success', 'You have successfully logged in.');
        } 
        else {
            session()->flash('error', 'Invalid credentials.');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}
}
