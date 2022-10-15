<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Constants\Constants;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        // if ($request->wantsJson()) {
        //     return response()->json(['two_factor' => false]);
        // }

        switch ($role) {
            case Constants::ROLE['Administrator']:
                return redirect()->route('admin.dashboard');
            case Constants::ROLE['Committee']:
                return redirect()->route('admin.dashboard');
            case Constants::ROLE['Graduate']:
                return redirect()->route('graduate.dashboard');
            case Constants::ROLE['Company']:
                return redirect()->route('company.dashboard');
        }
    }
}
