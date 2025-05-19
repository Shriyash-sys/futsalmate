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
        $booking = new Book([
        'date' => $request->date,
        'time' => $request->time,
        'payment' => $request->payment,
        'court_id' => $request->court_id,
        'user_id' => Auth::id(),
        'price' => Court::find($request->court_id)->price,
    ]);  

        // Save the booking
        $booking->save();

        // Redirect to the booking confirmation page with the user's ID
        return redirect()->route('bookingConfirmation', [
            'id' => $booking->id,
        ]);
    }

    public function showBookingConfirmation($id) {

        // $courts = Court::paginate();
        $booking = Book::with('court')->findOrFail($id);
        // dd($booking);
        return view('users.bookingConfirmation', compact('booking'));
    }

    public function cancelBooking() 
    {
        $user = Auth::user();
        $bookings = Book::where('user_id', $user->id)->get();
        $bookings->each->delete();

        return redirect()->route('mybookings',compact('bookings'));
    }
}
