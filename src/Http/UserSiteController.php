<?php


namespace PrageethPeiris\SiteAllocator\Http;




use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use PrageethPeiris\SiteAllocator\Data\UserSiteData;
use PrageethPeiris\SiteAllocator\Http\Transporter\IDataTransport;
use PrageethPeiris\SiteAllocator\Models\Site;

class UserSiteController extends  Controller
{


    /**
     * UserSiteController constructor.
     * @param IDataTransport $dataTransport
     */
    public function __construct(protected IDataTransport $dataTransport)
    {
    }

    public function show($id){

            $user = App::make(config('site-allocator.user'))->findOrFail($id);

            $sites = $user->sites();




        return $this->dataTransport->transport($sites->getQuery());


    }


    public function store($id,Request $request){

            $user = App::make(config('site-allocator.user'))->findOrFail($id);

            $payload_sites = UserSiteData::from($request)->sites;



            // $payload_sites = [1,3];

            $user->sites()->sync($payload_sites);



            $sites = Site::whereIn('id',$payload_sites);

            return $this->dataTransport->transport($sites);

    }












}