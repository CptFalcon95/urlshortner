<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The attributes that should be guarded for arrays.
     *
     * @var array
     */
    protected $guarded = [
        'user_id',
        'short_url'
    ];

    /**
     * Inject current user_id and short_url into model when a Url is saved
     * 
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($url) {
            // Check if user is loggedIn incase this method is called when seeding the DB
            // Otherwise seeding fails
            if(auth()->user() != null) {
                $url->user_id = auth()->user()->id;
            }
            $url->short_url = self::createUniqueShortUrl();
        });
    }

    /**
     * Change the route > model binding key from id to short_url
     */
    public function getRouteKeyName()
    {
        return 'short_url';
    }

    /**
     * Register the user -> urls relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create a unique short_url for saving in DB
     * While short_url already exists, create new short_url, and try again
     * Then return unique short_url
     * 
     * @return string
     */
    private static function createUniqueShortUrl()
    {
        $shortUrlKey = Str::random(8);

        while (Url::where('short_url', $shortUrlKey)->count() === 1) {
            $shortUrlKey = Str::random(8);
        }

        return $shortUrlKey;
    }
}
