<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class adminController extends Controller
{
    //
    public function destroyuser($id) {
        User::destroy($id);
    }
}
