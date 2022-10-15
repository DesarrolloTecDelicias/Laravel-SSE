<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Career;
//Constants
use App\Constants\Constants;

class GeneralController extends Controller
{
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

        switch ($role) {
            case Constants::ROLE['Administrator']:
                return redirect()->route('admin.index');
                break;
            case Constants::ROLE['Committee']:
                return redirect()->route('admin.index');
                break;
            case Constants::ROLE['Graduate']:
                return redirect()->route('graduate.index');
                break;
            case Constants::ROLE['Company']:
                return redirect()->route('company.index');
                break;
        }
    }
}
