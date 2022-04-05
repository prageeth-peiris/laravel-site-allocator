<?php


namespace PrageethPeiris\SiteAllocator\Data;


use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Required;

class SiteData extends  Data
{


    /**
     * SiteData constructor.
     */
    public function __construct(


        public ?int $id,

        #[Required]
            public  string $name,
          #[Required]
            public string $url

    )
    {





    }
}