<?php


namespace PrageethPeiris\SiteAllocator\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PrageethPeiris\SiteAllocator\Models\Site;
use PrageethPeiris\SiteAllocator\Tests\TestCase;
use PrageethPeiris\SiteAllocator\Tests\User;

class CheckSiteAllocationMiddlewareTest extends  TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Route::get('/dummy-test-route', function () {
            return 'nice';
        })->middleware(['is-site-allocated']);

    }

    /** @test */
    public function it_gives_error_if_authenticated_user_has_not_allocated_sites(){


        User::create([

            'name' => 'x',
            'email' => 'x@mail.com',
            'password' => Hash::make('123456')

        ]);

      $auth_user =   User::create([

            'name' => 'y',
            'email' => 'y@mail.com',
            'password' => Hash::make('123456')

        ]);


        Site::create([
            'name' => 'a',
            'url' => 'abcd'

        ]);
        Site::create([
            'name' => 'b',
            'url' => 'abcde'

        ]);
        Site::create([
            'name' => 'c',
            'url' => 'abcdef'

        ]);



        DB::table('user_sites')->insert([

            [
                'user_id' => 1 ,
                'site_id' => 2

            ],
            [

                'user_id' => 1,
                 'site_id' => 2

            ]



        ]);


        $response = $this->actingAs($auth_user)->getJson('dummy-test-route?site_id=3');

         $response->assertStatus(403);


    }




    /** @test */
    public function it_allows_request_if_authenticated_user_has_allocated_sites(){


        User::create([

            'name' => 'x',
            'email' => 'x@mail.com',
            'password' => Hash::make('123456')

        ]);

        $auth_user =   User::create([

            'name' => 'y',
            'email' => 'y@mail.com',
            'password' => Hash::make('123456')

        ]);


        Site::create([
            'name' => 'a',
            'url' => 'abcd'

        ]);
        Site::create([
            'name' => 'b',
            'url' => 'abcde'

        ]);
        Site::create([
            'name' => 'c',
            'url' => 'abcdef'

        ]);



        DB::table('user_sites')->insert([

            [
                'user_id' => 1 ,
                'site_id' => 2

            ],
            [

                'user_id' => 2,
                'site_id' => 2

            ]



        ]);


        $response = $this->actingAs($auth_user)->getJson('/dummy-test-route?site_id=2')
               ->assertStatus(200);




    }




}