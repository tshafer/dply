<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'shortcode', 'domain'
    ];

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }
}
