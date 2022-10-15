<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Constants\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function verfied()
    {
        $routes = [
            Constants::ROLE['Administrator'] => 'admin.dashboard',
            Constants::ROLE['Committee'] => 'admin.dashboard',
            Constants::ROLE['Graduate'] => 'graduate.dashboard',
            Constants::ROLE['Company'] => 'company.dashboard',
        ];

        $userRole = Auth::user()->role;
        $route =  $routes[$userRole];
        return redirect()->route($route);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }

    public function graduateRegistration()
    {
        $data['careers'] = Career::all();
        $data['months'] = Constants::MONTH;
        return view('auth.register', $data);
    }

    public function companyRegistration()
    {
        return view('auth.company-register');
    }

    public function pdf(Request $request)
    {
        $data['state'] = $request->session()->get('state');
        if ($request->session()->get('json')) {
            $data['json'] = $request->session()->get('json');
        } else {
            $data['json'] = null;
        }

        // $request->session()->forget('state');

        return view('pdf.general-report', $data);
    }

    public function datepdf(Request $request)
    {
        $data['dateState'] = $request->session()->get('dateState');
        // $request->session()->forget('dateState');

        return view('pdf.date-report', $data);
    }
}
