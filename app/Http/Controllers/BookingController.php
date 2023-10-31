<?php

namespace App\Http\Controllers;

class BookingController extends Controller
{
    /**
     * @return void
     */
    public function __invoke()
    {
        return view('bookings.create');
    }
}
