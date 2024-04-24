<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.booking.index', [
            'bookings' => Booking::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.booking.create', [
            'members' => User::where('role', 'member')->get(),
            'books' => Book::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
        ]);


        if (BookDetail::where('book_id', $request['book_id'])->where('availability', 'available')->get()->count() > 0) {

            $bookDetail_id = BookDetail::where('book_id', $request['book_id'])->where('availability', 'available')->latest()->first()->id;

            $validatedData['bookDetail_id'] = $bookDetail_id;

            $validatedData['admin_id'] = Auth::user()->id;

            Booking::create($validatedData);

            BookDetail::where('id', $bookDetail_id)->latest()->first()->update(['availability' => 'unavailable']);

            return redirect('/booking');
        } else {

            return redirect('/booking')->with('error', 'buku yg anda pilih sedang habis');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        if ($booking->return_date) {
            return redirect('/booking');
        } else {
            $booking->update(['return_date' => now()]);
            BookDetail::where('id', $booking->bookDetail_id)->latest()->first()->update(['availability' => 'available']);
            return redirect('/booking');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
