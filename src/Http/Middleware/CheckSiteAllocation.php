<?php


namespace PrageethPeiris\SiteAllocator\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PrageethPeiris\SiteAllocator\Data\GlobalSiteData;
use PrageethPeiris\SiteAllocator\Models\Site;

class CheckSiteAllocation
{


    public function handle($request, Closure $next)
    {

         $site =  (new Site) ;
         $site->id = GlobalSiteData::from($request)->site_id;

         $allocation = $site->hasUser(Auth::user());



        if(!$allocation){
            abort(403);
        }





        return $next($request);
    }




}