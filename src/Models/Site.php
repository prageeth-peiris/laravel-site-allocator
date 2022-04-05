<?php


namespace PrageethPeiris\SiteAllocator\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends  Model
{

    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }


    public function users(){

        return $this->belongsToMany(config('auth.providers.users.model'));

    }


}