<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\UrlStoreRequest;
use App\Http\Resources\UrlResource;
use App\Models\User;
use App\Models\Url;

class UrlController extends Controller
{
    /**
     * Get all the user's shortened urls
     *
     * @return  array
     */
    public function index()
    {
        
    }

    /**
     * Store shortened URL and return true or false, depending on a successful save
     * This method catches any MySQL exceptions and returns false if the query fails
     *
     * @return  bool
     */
    public function store(UrlStoreRequest $request)
    {
        $url = new Url;
        $url->user_id = Auth::id();
        $url->url = $request->url;
        $url->short_url = Str::random(6);

        try {    
            if($url->save()) {
                return true;
            }
        }
        catch(\Illuminate\Database\QueryException) { 
            return false;
        }

        return false;
    }

    /**
     * Update shortened URL
     *
     * @return  [type]  [return description]
     */
    public function update()
    {
    }

    /**
     * Delete shortened URL
     *
     * @return  [type]  [return description]
     */
    public function delete()
    {
    }
}
