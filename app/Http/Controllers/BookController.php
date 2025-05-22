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
        // Check if the court is already booked at the same date and time
        $existingBooking = Book::where('court_id', $request->court_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingBooking) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['time' => 'This court is already booked at the selected date and time.']);
        }

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

    public function cancelBooking($id) 
    {
        $user = Auth::user();
        $bookings = Book::where('id', $id)->where('user_id', $user->id)->first();

        if ($bookings) {
            
            $bookings->delete();
            return redirect()->route('mybookings')->with('success', 'Booking cancelled.');
        } else {
            
            return redirect()->route('mybookings')->with('error', 'Booking not found or not authorized.');
        }

        return redirect()->route('mybookings',compact('bookings'));
    }

    public function viewBooking($id) 
    {
        
        $viewBooking = Book::with('court')->findOrFail($id);
        // $editForm = Book::with('court')->findOrFail($id);
        return view('users.viewBooking', compact('viewBooking'));

    }

    public function editBookingForm($id) 
    {
        $editForm = Book::with('court')->findOrFail($id);
        return view('users.editBooking', compact('editForm'));
    }

    public function editBooking(Request $request, $id) 
    {
        $editBooking = Book::with('court')->findOrFail($id);
        
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string|max:255',
        ]);

        $editBooking->date = $validated['date'];
        $editBooking->time = $validated['time'];


        $editBooking->save();

        return redirect()->route('viewBooking', ['id' => $editBooking->id]);
    }
}
