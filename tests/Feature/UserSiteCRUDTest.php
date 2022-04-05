<?php


namespace PrageethPeiris\SiteAllocator\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PrageethPeiris\SiteAllocator\Models\Site;
use PrageethPeiris\SiteAllocator\Tests\TestCase;
use PrageethPeiris\SiteAllocator\Tests\User;

class UserSiteCRUDTest extends  TestCase
{

    use RefreshDatabase;


    /** @test */
    public function it_receive_sites_belong_to_a_user(){


            User::create([

                'name' => 'x',
                'email' => 'x@mail.com',
                'password' => Hash::make('1523456')

            ]);

        User::create([

            'name' => 'y',
            'email' => 'y@mail.com',
            'password' => Hash::make('1523456')

        ]);



        Site::create([
            'name' => 'a',
             'url' => 'abc'

        ]);

        Site::create([
            'name' => 'b',
            'url' => 'abc'

        ]);


        Site::create([
            'name' => 'c',
            'url' => 'abc'

        ]);


        DB::table('user_sites')->insert([
            [

                'user_id' => 1,
                'site_id' => 1

            ],
            [

                'user_id' => 1,
                'site_id' => 2

            ]


        ]);


        $response = $this->getJson('api/user/1/sites');



        $response->assertStatus(200)
                  ->assertJsonCount(2,'data')
                 ->assertJsonFragment([

                     'name' => 'a',
                     'url' => 'abc'

                 ]);



    }



    /** @test */
    public function it_adds_sites_to_a_user(){

        User::create([

            'name' => 'x',
            'email' => 'x@mail.com',
            'password' => Hash::make('1523456')

        ]);

        User::create([

            'name' => 'y',
            'email' => 'y@mail.com',
            'password' => Hash::make('1523456')

        ]);



        Site::create([
            'name' => 'a',
            'url' => 'abc'

        ]);

        Site::create([
            'name' => 'b',
            'url' => 'abc'

        ]);


        Site::create([
            'name' => 'c',
            'url' => 'abc'

        ]);

        DB::table('user_sites')->insert([
            [

                'user_id' => 1,
                'site_id' => 1

            ],
            [

                'user_id' => 1,
                'site_id' => 2

            ]


        ]);


        $response = $this->postJson('api/user/1/sites',[

            'sites' => [1,3]


        ]);




        $response->assertStatus(200)
                 ->assertJsonCount(2,'data')
                 ->assertJsonFragment([

                     'name' => 'c',
                     'url' => 'abc'

                 ]);


        $this->assertDatabaseCount('user_sites',2);

        $this->assertDatabaseMissing('user_sites',[

            'user_id' => 1,
            'site_id' => 2

        ]);




    }






}