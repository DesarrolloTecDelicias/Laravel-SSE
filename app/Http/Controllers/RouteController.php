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
            Constants::ROLE['Support'] => 'admin.dashboard',
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
        $newCareers = [];
        foreach ($data['state']['careers'] as $value) {
            $career = Career::find($value);
            $newCareers[$career['name']] = $career['name'];
        }

        $data['state']['careers'] = $newCareers;
        if ($request->session()->get('json')) {
            $data['json'] = $request->session()->get('json');
        } else {
            $data['json'] = null;
        }

        // $request->session()->forget('state');

        return view('pdf.general-report', $data);
    }

    public function pdfOption(Request $request)
    {
        $data['state'] = $request->session()->get('state');
        $newCareers = [];
        foreach ($data['state']['careers'] as $value) {
            $career = Career::find($value);
            $newCareers[$career['name']] = $career['name'];
        }

        $data['state']['careers'] = $newCareers;
        if ($request->session()->get('json')) {
            $data['json'] = $request->session()->get('json');
        } else {
            $data['json'] = null;
        }

        return view('pdf.general-option-report', $data);
    }

    public function maintenance(){
        return view('maintenance');
    }

    public function notFound(){
        return view('404');
    }
}
