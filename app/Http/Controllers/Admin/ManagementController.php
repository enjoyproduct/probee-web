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
    //Setting management
    public function index()
    {
        $setting = Admin::first();
        return View('admin.pages.settings', compact('setting'));
    }

    public function update_setting($admin_id)   
    {
        return redirect('admin/setting');
    }
 



    //FAQ management
    public function get_faqs()
    {
        $faqs = FAQ::get();
        return View('admin.pages.faq', compact('faqs'));
    }
    public function get_faq($faq_id = null)
    {
        if ($faq_id != null) {
            $faq = FAQ::findOrFail($faq_id);
            return View('admin.pages.faq-edit', compact('faq'));

        } else {
            return View('admin.pages.faq-edit');            
        }
    }

    public function update_faq($faq_id = null) 
    {
        if ($faq_id != null) { //update
            return redirect('admin/faq');
        } else { //create
            return redirect('admin/faq');
        }
        
    }

    public function delete_faq($faq_id) 
    {
        return redirect('admin/faq');
    }






    //Support management

    public function get_supports()
    {
        $supports = ContactUs::get();
        return View('admin.pages.support', compact('supports'));
    }
    public function get_support($contact_id)
    {
        $support = ContactUs::findOrFail($contact_id);
        return View('admin.pages.support-edit', compact('support'));
    }

    public function update_support($contact_id) 
    {
        return redirect('admin/support');
    }

    public function delete_support($contact_id) 
    {
        return redirect('admin/support');
    }
}
