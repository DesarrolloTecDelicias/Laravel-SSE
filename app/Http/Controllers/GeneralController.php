<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Career;
//Constants
use App\Constants\Constants;

class GeneralController extends Controller
{
    public $redirectRoute  =
    [
        Constants::ROLE['Administrator'] => 'admin.index',
        Constants::ROLE['Committee'] => 'admin.index',
        Constants::ROLE['Graduate'] => 'graduate.index',
        Constants::ROLE['Company'] => 'company.index',
    ];
    public function password()
    {
        return view('auth.forgot-password');
    }

    public function graduateRegister()
    {
        $data['careers'] = Career::all();
        return view('auth.register', $data);
    }

    public function companyRegister()
    {
        return view('auth.company_register');
    }

    public function index()
    {
        $role = Auth::user()->role;
        return $this->redirectRoute[$role];
    }
}
