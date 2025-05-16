<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdminLoginForm() 
    {
        return view('admin.auth.login');
    }

    public function showAdminSignupForm() 
    {
        return view('admin.auth.signup');
    }

    public function showAdminDashboard() 
    {
        $admin = Auth::guard('admin')->user();
        $bookings = Book::where('court_id', $admin->id)->count();
        $courts = Court::where('admin_id', $admin->id)->count();
        $courtName = Court::where('admin_id', $admin->id)->get();
        $userName = Book::
        return view('admin.dashboard', compact('admin','bookings','courts', 'courtName', 'userName'));
    }

    public function showAdminBookings() 
    {
        return view('admin.bookings');
    }

    public function showAdminMyCourts() 
    {
        $adminId = Auth::guard('admin')->id(); // explicitly get the admin ID

        $courts = Court::where('admin_id', $adminId)->get();

        return view('admin.mycourts', compact('courts'));
    }

    public function showAdminProfile() 
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function adminLogin(Request $request) 
    {
        // Validate the request data
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);

    }

    public function adminSignup(AdminRequest $request) 
    {
        // Create a new admin user
        $admin = Admin::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log the admin in
        Auth::login($admin);

        return redirect()->route('admin');

    }

    public function adminLogout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin');
    }

    public function showAddCourtForm() 
    {
        return view('admin.addcourt');
    }

    public function addCourt(Request $request) 
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        abort(403, 'User not authenticated.');
    }

    $validatedData = $request->validate([
        'court_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string|max:1000',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Store image
    $imagePath = $request->file('image')->store('images', 'public');
    $imageUrl = Storage::url($imagePath);

    // Create new Court
    $court = new Court();
    $court->court_name = $validatedData['court_name'];
    $court->location = $validatedData['location'];
    $court->price = $validatedData['price'];
    $court->description = $validatedData['description'];
    $court->image_path = $imagePath;
    $court->image_url = $imageUrl;

    $court->admin_id = Auth::guard('admin')->id();
    

    $court->save();

    return redirect()->route('admin.mycourts');
}
}

