<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Studio;
use App\Model\City;

class StudioController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $studios = Studio::leftJoin('tbl_city', 'tbl_city.city_id', 'tbl_studio.city_id')->get();
        return View('admin.pages.studios', compact('studios'));
    }

    public function get_studio($studio_id)
    {
        $cities = City::get();
        $studio = Studio::findOrFail($studio_id);
        return View('admin.pages.studio-edit', compact('studio', 'cities'));
    }

    public function update_studio($studio_id) 
    {
        return redirect('admin/studios');
    }

}
