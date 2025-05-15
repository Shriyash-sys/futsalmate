<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function bookCourt(BookRequest $request)
    {
        $booking = new Book($request->all());  // Populate the model with the request data
        $booking->user_id = Auth::id();        // Set the authenticated user's ID
        $booking->price = Court::find($request->court_id)->price;

        // Save the booking
        $booking->save();

        // Redirect to the booking confirmation page with the user's ID
        return redirect()->route('bookingConfirmation', [
            'id' => $booking->id,
        ]);
    }

    public function showBookingConfirmation($id) {

        $courts = Court::with('court')->paginate();
        $booking = Book::findOrFail($id);
        return view('users.bookingConfirmation', compact('booking', 'courts'));
    }
}
