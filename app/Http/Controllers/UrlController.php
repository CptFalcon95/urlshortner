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
     * User_id and short_url are assigned within the URL model
     *
     * @return  bool  returns true if saving was successful
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
     * Check using UrlPolicy if the url's user matches the user -
     * performing update action.
     *
     * @return  bool  returns true if user is allowed to update, and update was successful
     */
    public function update(UrlStoreRequest $request, Url $url)
    {
        try {
            if ($this->authorize('update', $url)) {
                $url->url = $request->url;
                $url->save();

                return true;
            }
        } catch (\Exception $e) {
            info($e->getMessage());
        } 
        
        return false;
    }

    /**
     * Delete shortened URL
     *
     * @return  bool  returns true if deleting was successful
     */
    public function destroy(Url $url)
    {
        try {
            $url->delete();

            return true;
        } catch(\Exception $e) {
            info($e->getMessage());
        }
        
        return false;
    }

    /**
     * Increment visit counter and redirect to URL
     *
     * @return  redirect  redirects to the original url
     */
    public function directUrl(Url $url)
    {
        try {
            $url->visit_count++;
            $url->save();

            return view('redirect', [
                'url' => $url->url
            ]);
        } catch (\Exception $e) {
            abort(403, $e->getMessage());
        }
    }
}
