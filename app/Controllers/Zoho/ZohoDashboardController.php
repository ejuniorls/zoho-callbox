<?php

namespace App\Controllers\Zoho;

use App\Controllers\BaseController;

class ZohoDashboardController extends BaseController
{
    public function index()
    {
        //
        return view('Zoho/dashboard/home');
    }

    public function users()
    {
        //
        return view('Zoho/dashboard/users');
    }

    public function settings()
    {
        //
        return view('Zoho/dashboard/settings');
    }
}
