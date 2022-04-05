<?php


namespace PrageethPeiris\SiteAllocator\Http;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PrageethPeiris\SiteAllocator\Data\SiteData;
use PrageethPeiris\SiteAllocator\Http\Transporter\IDataTransport;
use PrageethPeiris\SiteAllocator\Models\Site;

class SiteController extends  Controller
{

    protected IDataTransport $dataTransporter;

    /**
     * SiteController constructor.
     */
    public function __construct(IDataTransport $dataTransport)
    {
        $this->dataTransporter = $dataTransport;
    }

    public function index(){


    return    $this->dataTransporter->transport(Site::query());




}


public function show(Site $site){




        return $this->dataTransporter->transport($site);




}


public function store(Request $request){

        $data = SiteData::from($request)->all();




        $site = Site::create($data);






        return $this->dataTransporter->transport($site);


}



public function update(Site $site,Request $request){





    $data = SiteData::from($request)->all();


    Arr::forget($data,'id');  //remove id column


    $site->updateOrFail($data);



    return $this->dataTransporter->transport($site);



}




public function destroy(Site $site){



        $site->deleteOrFail();

    return $this->dataTransporter->transport($site);




}










}