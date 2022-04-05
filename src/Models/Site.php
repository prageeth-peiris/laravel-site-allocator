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

    public function hasUser($user){

      return   $this->users()->where('user_id',$user->getKey())
            ->exists();

    }




}