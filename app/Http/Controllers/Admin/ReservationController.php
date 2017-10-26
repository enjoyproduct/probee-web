<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Reservation;

class ReservationController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $reservations = Reservation::get();
        return View('admin.pages.reservations', compact('reservations'));
    }
}
