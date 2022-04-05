<?php


namespace PrageethPeiris\SiteAllocator\Traits;


use PrageethPeiris\SiteAllocator\Models\Site;

trait  ownSite
{


    public function sites(){

        return $this->belongsToMany(Site::class,'user_sites');

    }







}