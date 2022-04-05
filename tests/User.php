<?php


namespace PrageethPeiris\SiteAllocator\Tests;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PrageethPeiris\SiteAllocator\Traits\ownSite;


class User extends Model implements AuthorizableContract, AuthenticatableContract
{

    use Authorizable, Authenticatable, HasFactory,ownSite;

    protected $guarded = [];

    protected $table = 'users';




}