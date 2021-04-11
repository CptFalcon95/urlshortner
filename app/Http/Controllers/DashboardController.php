<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    /**
     * Remove unnessecary data from list
     *
     * @return  array
     */
    public function index() {        
        return view('dashboard', [
            'urls' => User::findOrFail(Auth::id())->urls()->get()
        ]);
    }
}
