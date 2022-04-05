<?php


namespace PrageethPeiris\SiteAllocator\Http\Transporter;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use PrageethPeiris\SiteAllocator\Data\SiteData;
use PrageethPeiris\SiteAllocator\Http\Resources\SiteResource;

class DefaultTransporter implements IDataTransport
{
    public function transport(Builder | \Illuminate\Database\Eloquent\Builder | Model $builder)
    {

        if($builder instanceof Model){

              return new SiteResource(SiteData::from($builder));

        }


       return  new SiteResource(SiteData::collection($builder->get()));


    }


}