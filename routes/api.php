<?php


use Illuminate\Support\Facades\Route;
use PrageethPeiris\SiteAllocator\Http\SiteController;

Route::resource('sites', SiteController::class);

Route::get('user/{id}/sites',[\PrageethPeiris\SiteAllocator\Http\UserSiteController::class,'show']);

Route::post('user/{id}/sites',[\PrageethPeiris\SiteAllocator\Http\UserSiteController::class,'store']);

