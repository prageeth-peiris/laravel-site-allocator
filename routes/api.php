<?php


use Illuminate\Support\Facades\Route;
use PrageethPeiris\SiteAllocator\Http\SiteController;

Route::resource('sites', SiteController::class);

