<?php


namespace PrageethPeiris\SiteAllocator\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends  Model
{

    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];





    public function users(){

        return $this->belongsToMany(config('site-allocator.user'),'user_sites');

    }


}