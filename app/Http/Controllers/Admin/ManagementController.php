<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin;
use App\Model\FAQ;
use App\Model\ContactUs;

class ManagementController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $setting = Admin::get();
        return View('admin.pages.settings', compact('setting'));
    }

    public function get_faq()
    {
        $faqs = FAQ::get();
        return View('admin.pages.faq', compact('faqs'));
    }

    public function get_support()
    {
        $supports = ContactUs::get();
        return View('admin.pages.support', compact('supports'));
    }
}
