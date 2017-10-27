<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Activity;
use App\Model\Studio;

class ActivityController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $activities = Activity::leftJoin('tbl_studio', 'tbl_studio.studio_id', 'tbl_activity.studio_id')->get();
        return View('admin.pages.activities', compact('activities'));
    }

    public function get_activity($activity_id)
    {
        
        $activity = Activity::findOrFail($activity_id);
        return View('admin.pages.activity-edit', compact('activity'));
    }

    public function update_activity($activity_id) 
    {
        return redirect('admin/activities');
    }

}
