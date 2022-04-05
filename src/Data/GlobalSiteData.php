<?php


namespace PrageethPeiris\SiteAllocator\Data;


use Spatie\LaravelData\Data;

class GlobalSiteData extends Data
{


    /**
     * GlobalSiteData constructor.
     */
    public function __construct(
        public int $site_id
    )
    {
    }
}