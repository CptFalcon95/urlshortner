<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlStoreRequest;
use App\Models\User;
use App\Models\Url;


class UrlController extends Controller
{
    /**
     * Display all the urls on the dashboard
     *
     * @return  view
     */
    public function show()
    {
        $user = User::findOrFail(auth()->id());

        return view('dashboard', [
            'urls' => $user->urls()->get()
        ]);
    }

    /**
     * Get all the user's shortened urls
     *
     * @return  array
     */
    public function index(User $user)
    {
        return $user->urls()->get();
    }


    /**
     * Store shortened URL. This method is called by an ajax call from the frontend
     *
     * @return  bool
     */
    public function store(UrlStoreRequest $request)
    {
        if (Url::create($request->validated())) {
            return true;
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
