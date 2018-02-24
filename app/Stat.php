<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url_id','iso_code','country','city','state','state_name','postal_code','lat','lon','timezone','continent','currency','browser_name','browser_family','browser_version','browser_version_major','browser_version_minor','browser_version_patch','browser_engine','platform_name','platform_family','platform_version','platform_version_major','platform_version_minor','platform_version_patch','device_family','device_model','mobile_grade',
    ];

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
