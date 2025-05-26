<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FutsalController;
use App\Http\Controllers\ProfileController;
use App\Models\Admin;

Route::resource('/futsals', FutsalController::class);

Route::get('/login', [FutsalController::class, 'showLoginForm'])->name('loginForm');

Route::get('/signup-form', [FutsalController::class, 'showSignupForm'])->name('signupForm');  

Route::post('/signup', [FutsalController::class, 'register'])->name('register');

Route::post('/login', [FutsalController::class, 'login'])->name('login');

Route::redirect('/', 'futsals');

Route::post('/logout', [FutsalController::class, 'logout'])->name('logout');

Route::get('/mybookings', [FutsalController::class, 'showMyBookings'])->name('mybookings');

Route::get('/profile', [FutsalController::class, 'showProfile'])->name('profile');

Route::get('/dashboard', [FutsalController::class, 'userDashboard'])->name('userDashboard');

Route::post('/contact', [FutsalController::class, 'contact'])->name('contact');

// Apply 'auth' middleware to protect the route
Route::middleware(['auth'])->group(function () {
    Route::put('/edit-profile', [ProfileController::class, 'editProfile'])->name('editProfile');
    
    Route::post('/add-profile-photo', [ProfileController::class, 'addProfilePhoto'])->name('addProfilePhoto');
    
    Route::delete('/delete-profile-photo', [ProfileController::class, 'deleteProfilePhoto'])->name('deleteProfilePhoto');

});

// Apply middleware to protect the booking routes
Route::middleware(['auth'])->group(function () {

    Route::get('/book-court', [FutsalController::class, 'showBookCourt'])->name('bookcourt');

    Route::post('/bookings', [BookController::class, 'bookCourt'])->name('bookings');

    Route::get('/booking-confirmation/{id}', [BookController::class, 'showBookingConfirmation'])->name('bookingConfirmation');

    Route::delete('/delete-booking/{id}', [BookController::class, 'cancelBooking'])->name('deleteBooking');

    Route::get('/view-booking/{id}', [BookController::class, 'viewBooking'])->name('viewBooking');

    Route::get('/edit-booking-form/{id}', [BookController::class, 'editBookingForm'])->name('editBookingForm');

    Route::put('/edit-booking/{id}', [BookController::class, 'editBooking'])->name('editBooking');

});

Route::get('/admin', [AdminController::class, 'showAdminLoginForm'])->name('admin');

Route::get('/admin/signup-form', [AdminController::class, 'showAdminSignupForm'])->name('admin.signupForm');

Route::post('/admin/signup', [AdminController::class, 'adminSignup'])->name('admin.signup');

Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');   

Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');
    
    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logouts');
    
    Route::get('/admin/bookings', [AdminController::class, 'showAdminBookings'])->name('admin.bookings');
    
    Route::get('/admin/mycourts', [AdminController::class, 'showAdminMyCourts'])->name('admin.mycourts');

    Route::get('/admin/users', [AdminController::class, 'showAdminUsers'])->name('admin.users');
    
    Route::get('/admin/profile', [AdminController::class, 'showAdminProfile'])->name('admin.profile');
    
    Route::get('/admin/add-court-Form', [AdminController::class, 'showAddCourtForm'])->name('admin.addcourtForm');

    Route::get('/admin/view-mycourt/{id}', [AdminController::class, 'adminViewMyCourt'])->name('admin.viewMyCourt');

    Route::get('/admin/edit-mycourt-form/{id}', [AdminController::class, 'adminEditCourtForm'])->name('admin.editMyCourtForm');

    Route::get('/admin/edit-profile-form/{id}', [AdminController::class, 'showAdminEditProfileForm'])->name('admin.editProfileForm');
    
    Route::post('/admin/add-court', [AdminController::class, 'addCourt'])->name('admin.addcourt');

    Route::put('/admin/edit-my-court/{id}', [AdminController::class, 'adminEditMyCourt'])->name('admin.editMyCourt');

    Route::put('/admin/edit-profile/{id}', [AdminController::class, 'adminEditProfile'])->name('admin.editProfile');
    
    Route::post('/admin/admin-profile-photo', [AdminController::class, 'addAdminProfilePhoto'])->name('admin.addAdminProfilePhoto');

    Route::delete('/admin/delete-profile-photo', [AdminController::class, 'deleteAdminProfilePhoto'])->name('admin.deleteAdminProfilePhoto');

    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    Route::delete('/admin/delete-bookings/{id}', [AdminController::class, 'adminCancelbooking'])->name('admin.cancelBookings');

    Route::delete('/admin/delete-courts/{id}', [AdminController::class, 'adminDeleteCourt'])->name('admin.deleteCourt');
});


Route::get('/success', [BookController::class, 'success'])->name('esewa.success');
Route::get('failled', [BookController::class, 'failure'])->name('esewa.failure');

Route::patch('/admin/bookings/{booking}/approve', [AdminController::class, 'approve'])->name('admin.bookings.approve');

Route::patch('/admin/bookings/{booking}/reject', [AdminController::class, 'reject'])->name('admin.bookings.reject');


