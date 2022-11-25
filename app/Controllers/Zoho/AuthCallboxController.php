<?php

namespace App\Controllers\Zoho;

use App\Controllers\BaseController;

class AuthCallboxController extends BaseController
{
    public function index()
    {
        //
        return view('Zoho/auth/login');
    }

    public function logout()
    {
        //
        session()->destroy();
        return redirect()->to('zoho/login');
    }


}
