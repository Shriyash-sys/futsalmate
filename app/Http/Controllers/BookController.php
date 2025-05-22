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
    $existingBooking = Book::where('court_id', $request->court_id)
    ->where('date', $request->date)
    ->where('time', $request->time)
    ->first();

    if ($existingBooking) {
    return redirect()->back()
    ->withInput()
    ->withErrors(['time' => 'This court is already booked at the selected date and time.']);
    }
    $transaction_uuid = time(); // Or: Str::uuid()

    $booking = new Book([
    'transaction_uuid' => $transaction_uuid,
    'date' => $request->date,
    'time' => $request->time,
    'payment' => $request->payment,
    'court_id' => $request->court_id,
    'user_id' => Auth::id(),
    'price' => Court::find($request->court_id)->price,
    ]);

    $booking->save();

    // Prepare eSewa payment data
    $amount = $booking->price;
    $tax_amount = 0;
    $total_amount = $amount + $tax_amount;
    $product_code = 'EPAYTEST';
    $product_service_charge = 0;
    $product_delivery_charge = 0;
    $success_url = route('esewa.success'); // You can define your Laravel route
    $failure_url = route('esewa.failure');
    $signed_field_names = "total_amount,transaction_uuid,product_code";

    $message = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=$product_code";
    $secret_key = "8gBm/:&EnhH.1/q"; // Replace with your actual merchant key
    $signature = base64_encode(hash_hmac('sha256', $message, $secret_key, true));

    return view('payments.esewa_form', compact(
    'amount',
    'tax_amount',
    'total_amount',
    'transaction_uuid',
    'product_code',
    'product_service_charge',
    'product_delivery_charge',
    'success_url',
    'failure_url',
    'signed_field_names',
    'signature'
    ));
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


public function success(Request $request){
    $encodedData = $request->query('data'); // get 'data' query parameter

    if ($encodedData) {
    // Base64 decode
    $jsonData = base64_decode($encodedData);
    // JSON decode to associative array
    $data = json_decode($jsonData, true);
    if($data['status'] =="COMPLETE"){
        Book::where('transaction_uuid ', $data['transaction_uuid'])
        ->update([
            'status' => 'Paid',
        ]);
    }
} else {
$data = null;
}
return view('payments.esewa_success',compact('data'));  
}


public function failure(){
    return view('payments.esewa_failed');
}
}