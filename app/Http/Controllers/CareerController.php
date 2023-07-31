<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;

class CareerController extends Controller
{
    public function getAll(Request $request)
    {
        return Career::all();
    }

    public function getById(Request $request, $id)
    {
        return Career::findOrFail($id);
    }
}
