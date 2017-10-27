<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Reservation;
use App\Model\Studio;
use App\Model\User;
use App\Model\TimeSlot;
use App\Model\Activity;


class ReservationController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $reservations = Reservation::leftJoin('tbl_user', 'tbl_user.user_id', 'tbl_reservation.user_id')
        ->leftJoin('tbl_time_slot', 'tbl_time_slot.timeslot_id', 'tbl_reservation.timeslot_id')
        ->leftJoin('tbl_activity', 'tbl_activity.activity_id', 'tbl_reservation.activity_id')
        ->leftJoin('tbl_studio', 'tbl_studio.studio_id', 'tbl_activity.studio_id')
        ->select('tbl_reservation.reservation_id', 'tbl_user.fullname', 'tbl_studio.studio_name', 'tbl_studio.address', 'tbl_activity.pass', 'tbl_activity.price', 'tbl_time_slot.date', 'tbl_time_slot.start_time', 'tbl_time_slot.end_time')
        ->get();
        return View('admin.pages.reservations', compact('reservations'));
    }
    public function get_reservation($reservation_id)
    {

        return View('admin.pages.reservation-edit', compact('reservation'));
    }

    public function update_reservation($reservation_id) 
    {
        return redirect('admin/reservations');
    }
    public function cancel_reservation($reservation_id) 
    {
        return redirect('admin/reservations');
    }
}
