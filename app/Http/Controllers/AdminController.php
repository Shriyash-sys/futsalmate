<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    // ----------------------------Admin Login Form-------------------------

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    // ----------------------------Admin Signup Form-------------------------

    public function showAdminSignupForm()
    {
        return view('admin.auth.signup');
    }


    // -------------------------Admin Dashboard----------------------

    public function showAdminDashboard()
    {
        $admin = Auth::guard('admin')->user();


        if (!$admin) {
            // Optionally redirect or throw an exception
            return redirect()->route('admin')->withErrors('Please login first.');
        }

        $adminId = Auth::id();
        $courtIds = Court::where('admin_id', $admin->id)->pluck('id');
        $bookings = Book::whereIn('court_id', $courtIds)->count();

        $courts = Court::where('admin_id', $admin->id)->count();
        $courtName = Court::where('admin_id', $admin->id)->limit(3)->get();

        $userName = Book::with(['user', 'court'])
            ->whereHas('court', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->latest()->get(); // eager load related data

        // $adminId = $admin->id;

        $totalRevenue = Book::whereHas('court', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->sum('price');

        $registeredUserCount = Book::whereHas('court', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->distinct('user_id')->count('user_id');

        $userManagement = $users = User::get();

        return view('admin.dashboard', compact(
            'admin',
            'bookings',
            'courts',
            'courtName',
            'userName',
            'totalRevenue',
            'registeredUserCount',
            'userManagement',
        ));
    }


    // ----------------------------Admin Bookings-------------------------


    public function showAdminBookings(Request $request)
    {
        $adminId = Auth::id();
        $status = $request->get('status', 'Pending'); // Default to 'Pending'

        // Only bookings by this admin and with the selected status
        $bookings = Book::with(['user', 'court'])
            ->where('status', $status)
            ->whereHas('court', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->latest()
            ->get();

        return view('admin.bookings', [
            'bookings' => $bookings,
            'status' => $status
        ]);
    }


    // ----------------------------Admin My Courts-------------------------


    public function showAdminMyCourts()
    {
        $adminId = Auth::guard('admin')->id(); // explicitly get the admin ID

        $courts = Court::where('admin_id', $adminId)->get();

        return view('admin.mycourts', compact('courts'));
    }

    // ----------------------------Admin Profile-------------------------


    public function showAdminProfile()
    {
        $admin = Auth::guard('admin')->user();

        $adminId = $admin->id;

        $courts = Court::where('admin_id', $adminId)->count();

        $courtIds = Court::where('admin_id', $adminId)->pluck('id');
        $bookings = Book::whereIn('court_id', $courtIds)->count();

        $registeredUserCount = Book::whereHas('court', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->distinct('user_id')->count('user_id');

        $joinedDate = $admin->created_at->format('Y-m-d');

        return view('admin.profile', compact('admin', 'courts', 'bookings', 'registeredUserCount', 'joinedDate'));
    }

    // ----------------------------Admin Users-------------------------


    public function showAdminUsers()
    {
        $users = User::get(); // eager load related data
        return view('admin.user', compact('users'));
    }

    // ----------------------------------Admin Login-----------------------------


    public function adminLogin(Request $request)
    {
        // Validate the request data
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('admin.dashboard')->with('success', 'You have successfully logged in.');
        }

        return back()->withErrors([
            'error' => 'Email or password did not match.',
        ])->withInput();
    }

    // ----------------------------Admin Signup-------------------------


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

    // ----------------------------Admin Logout-------------------------


    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin');
    }

    // ----------------------------Admin Add Court Form-------------------------


    public function showAddCourtForm()
    {
        return view('admin.addcourt');
    }

    // ----------------------------Admin Add Court-------------------------


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

    // ----------------------------Admin Profile Photo-------------------------

    public function addAdminProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {

            $admin = Auth::guard('admin')->user();

            if (!$admin || !($admin instanceof Admin)) {
                abort(403, 'User not authenticated or invalid model.');
            }

            // Delete old photo
            if ($admin->profile_photo_path) {
                Storage::delete($admin->profile_photo_path);
            }

            // Store new photo
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $admin->profile_photo_path = $path;
            $admin->profile_photo_url = Storage::url($path);

            $admin->save();
        }
        return redirect()->route('admin.profile')->with('success', 'Profile photo updated.');
    }

    // ----------------------------Admin Delete Profile Photo-------------------------

    public function deleteAdminProfilePhoto()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin || !($admin instanceof Admin)) {
            abort(403, 'User not authenticated or invalid model.');
        }

        // Delete old photo
        if ($admin->profile_photo_path) {
            Storage::delete($admin->profile_photo_path);

            $admin->profile_photo_path = null;
            $admin->profile_photo_url = null;
            $admin->save();
        }

        return redirect()->route('admin.profile')->with('success', 'Profile photo deleted.');
    }


    // ----------------------------Admin Delete User-------------------------
    public function deleteUser($id)
    {
        $admin = Auth::guard('admin')->user();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users', compact('user'));
    }

    // ----------------------------Admin Delete Booking-------------------------

    public function adminCancelBooking($id)
    {

        $admin = Auth::guard('admin')->user();
        $bookings = Book::where('user_id', $admin->id)->first();

        if ($bookings) {

            $bookings->delete();
            return redirect()->route('admin.bookings')->with('success', 'Booking cancelled.');
        } else {

            return redirect()->route('admin.bookings')->with('error', 'Booking not found or not authorized.');
        }

        return redirect()->route('admin.bookings', compact('bookings'));
    }


    // ----------------------------Admin Delete Court-------------------------


    public function adminDeleteCourt($id)
    {

        $admin = Auth::guard('admin')->user();

        Court::findOrFail($id)->delete();
        return redirect()->route('admin.mycourts');
    }

    // ----------------------------Admin View My Court-------------------------


    public function adminViewMyCourt($id)
    {
        $court = Court::findOrFail($id);

        return view('admin.viewmycourt', compact('court'));
    }

    // ----------------------------Admin Edit Court Form-------------------------


    public function adminEditCourtForm($id)
    {
        $court = Court::findOrFail($id);

        return view('admin.editmycourt', compact('court'));
    }

    // ----------------------------Admin Edit My Court-------------------------


    public function adminEditMyCourt(Request $request, $id)
    {
        $editCourt = Court::findOrFail($id);

        $validated = $request->validate([
            'court_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $editCourt->court_name = $validated['court_name'];
        $editCourt->location = $validated['location'];
        $editCourt->price = $validated['price'];
        $editCourt->description = $validated['description'];

        // Handle image upload
        if ($request->hasFile('image')) {

            // Delete old image if it exists

            if ($editCourt->image_path && Storage::disk('public')->exists($editCourt->image_path)) {

                Storage::disk('public')->delete('storage/court_images/' . $editCourt->image_path);
            }

            // Store new image
            $image = $request->file('image')->store('images', 'public');
            $editCourt->image_path = $image;
            $editCourt->image_url = Storage::url($image);
        }

        $editCourt->save();
        return redirect()->route('admin.viewMyCourt', ['id' => $editCourt->id]);
    }

    // ----------------------------Admin Show Edit Profile Form-------------------------

    public function showAdminEditProfileForm($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.editprofile', compact('admin'));
    }

    // ----------------------------Admin Edit Profile -------------------------

    public function adminEditProfile(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $admin->full_name = $validated['full_name'];
        $admin->email = $validated['email'];

        if ($request->filled('current_password')) {

            if (!Hash::check($request->current_password, $admin->password)) {

                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $request->validate([
                'new_password' => 'required|string|min:8|confirmed',
            ]);

            $admin->password = Hash::make($request->new_password);
        }

        $admin->save();

        return redirect()->route('admin.profile', ['id' => $admin->id])->with('success', 'Profile updated successfully!');
    }


    public function approve(Book $booking)
    {
        if ($booking->status !== 'Pending') {
            return back()->with('error', 'Only pending bookings can be approved.');
        }

        $booking->status = 'Confirmed';
        $booking->save();

        return back()->with('success', 'Booking approved successfully.');
    }


    public function reject(Book $booking)
    {
        if ($booking->status !== 'Pending') {
            return back()->with('error', 'Only pending bookings can be rejected.');
        }

        $booking->status = 'Rejected';
        $booking->save();

        return back()->with('success', 'Booking rejected successfully.');
    }
}
