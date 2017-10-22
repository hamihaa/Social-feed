<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{

    protected $table = 'feed';

    //declared for usage of ->diffForHumans() on added_at timestamp
    protected $dates = [
        'created_at',
        'updated_at',
        'added_at'
    ];

    protected $fillable = ['uid', 'post_type', 'username', 'description', 'added_at'];

    /**
     *  Get slovenian date format (example: 10 minut nazaj)
     *
     * @return mixed
     */
    public function getSloDateAttribute()
    {
        Carbon::setLocale('sl');
        return $this->added_at->diffForHumans();
    }
}
