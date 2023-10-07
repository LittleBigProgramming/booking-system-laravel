<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     *
     * @return void
     */
    public function __invoke()
    {
        return view('bookings.create');
    }
}
