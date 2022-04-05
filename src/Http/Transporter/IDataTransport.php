<?php


namespace PrageethPeiris\SiteAllocator\Http\Transporter;




use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface IDataTransport
{


    /**
     * @param \Illuminate\Database\Eloquent\Builder|Model|Builder $builder
     * @return mixed
     */
    public function transport(Builder | \Illuminate\Database\Eloquent\Builder | Model $builder);




}