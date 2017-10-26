<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Studio;

class StudioController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $studios = Studio::get();
        return View('admin.pages.studios', compact('studios'));
    }
}
