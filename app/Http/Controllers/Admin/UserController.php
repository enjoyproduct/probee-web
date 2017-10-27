<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\Controller;

use App\Model\User;
use App\Model\Vendor;
use App\Model\Transaction;
use App\Model\City;


class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        
    }
    /* User management */
	public function get_users()
    {
        $users = User::where('status', '1')->get();
        return View('admin.pages.users', compact('users'));
    }
    
    public function get_user($user_id)
    {
        $cities = City::get();
        $user = User::findOrFail($user_id);
        return View('admin.pages.user-edit', compact('user', 'cities'));
    }

    public function update_user($user_id) 
    {
        return redirect('admin/users');
    }


    /* Vendor Management */
    public function get_vendors()
    {
        $vendors = Vendor::where('status', '1')->get();
        return View('admin.pages.vendors', compact('vendors'));
    }

    public function get_vendor($vendor_id)
    {
        $vendor = Vendor::findOrFail($vendor_id);
        return View('admin.pages.vendor-edit', compact('vendor'));
    }

    

    public function update_vendor($vendor_id) 
    {
        return redirect('admin/vendors');
    }

    /* Transaction Management */
    public function get_transactions()
    {
        $transactions = Transaction::leftJoin('tbl_user', 'tbl_user.user_id', 'tbl_transaction.user_id')
        ->leftJoin('tbl_activity', 'tbl_activity.activity_id', 'tbl_transaction.activity_id')
        ->leftJoin('tbl_studio', 'tbl_studio.studio_id', 'tbl_activity.studio_id')
        ->select('*', DB::raw('EXISTS(SELECT fullname FROM tbl_vendor WHERE tbl_vendor.vendor_id = tbl_transaction.vendor_id) as vendor_name'))
        ->get();
        return View('admin.pages.transactions', compact('transactions'));
    }


}
