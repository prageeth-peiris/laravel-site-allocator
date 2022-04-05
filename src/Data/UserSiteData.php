<?php


namespace PrageethPeiris\SiteAllocator\Data;


use Spatie\LaravelData\Data;

class UserSiteData extends  Data
{


    /**
     * UserSiteData constructor.
     */
    public function __construct(

        public array $sites


    )
    {
    }
}