<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function getAll(){
        return Career::all();
    }

    public function getById($id){
        return Career::findOrFail($id);
    }
}
