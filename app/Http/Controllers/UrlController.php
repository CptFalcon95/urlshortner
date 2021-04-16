<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlStoreRequest;
use App\Models\User;
use App\Models\Url;


class UrlController extends Controller
{
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
     * Display all the urls on the dashboard
     *
     * @return  view
     */
    public function show()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('dashboard', [
            'urls' => $user->urls()->get()
        ]);
    }

    /**
     * Store shortened URL. This method is called by an ajax call from the frontend
     *
     * @return  bool
     */
    public function store(UrlStoreRequest $request)
    {
        try {
            Url::create($request->validated());

            return true;
        } catch (\Exception $e) {
            info($e->getMessage());

            return false;
        }
    }
    
    /**
     * Update shortened URL
     *
     * @return  [type]  [return description]
     */
    public function update(UrlStoreRequest $request, Url $url)
    {
        $url->url = $request->url;

        // if($url->url != $request->url || $url->user_id === auth()->user()->id) {
        //     return response()->json([
        //         'errors' => "hetzelfde",
        //     ], 422);
        // }

        if($url->save()) {
            return true;
        }

        return false;
    }

    /**
     * Delete shortened URL
     *
     * @return  [type]  [return description]
     */
    public function destroy(Url $url)
    {

    }

    /**
     * Increment visit counter and redirect to URL
     *
     * @return  redirect
     */
    public function directUrl(Request $request)
    {
        try {
            $url = Url::where('short_url', $request->url)->firstOrFail();
            $url->visit_count++;

            $url->save();

            return redirect($url->url);
        } catch (\Exception $e) {
            abort(403, $e->getMessage());
        }
    }
}
