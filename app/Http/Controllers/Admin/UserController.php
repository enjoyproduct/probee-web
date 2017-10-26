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
	public function get_users()
    {
        $users = User::where('status', '1')->get();
        return View('admin.pages.users', compact('users'));
    }
    
    public function get_vendors()
    {
        $vendors = Vendor::where('status', '1')->get();
        return View('admin.pages.vendors', compact('vendors'));
    }

    public function get_transactions()
    {
        $transactions = Transaction::get();
        return View('admin.pages.transactions', compact('transactions'));
    }
}
