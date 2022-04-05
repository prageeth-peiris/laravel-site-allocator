<?php


namespace PrageethPeiris\SiteAllocator\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use PrageethPeiris\SiteAllocator\Models\Site;
use PrageethPeiris\SiteAllocator\Tests\TestCase;

class SiteCRUDTest extends  TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_retrieve_all_sites(){


        Site::insert([

            [

                'name'  =>  'example.com',
                 'url' => 'http://example.com'

            ],
            [

                'name'  =>  'example2.com',
                'url' => 'http://example2.com'

            ]
,
            [

                'name'  =>  'example3.com',
                'url' => 'http://example3.com'

            ]






        ]);



        $response = $this->getJson('api/sites');




        $response->assertStatus(200)
                 ->assertJsonCount(3,'data')
                 ->assertJsonFragment([

                     'name' => 'example.com',
                     'url' => 'http://example.com'

                 ]);

        ;
    }


    /** @test */
    public function it_validates_name_url_required(){


        $response = $this->postJson('api/sites',[

           'name' => '',
            'url' => ''
        ]);

        $response->assertStatus(422)
                  ->assertJsonValidationErrors(['name','url'])
        ;


    }

    /** @test */
    public function it_saves_validated_site_data(){

        $response = $this->postJson('api/sites',[

            'name' => 'example.com',
            'url' => 'http://example.com'
        ]);

        $response = $this->postJson('api/sites',[

            'name' => 'example.com',
            'url' => 'http://example.com'
        ]);




        $response->assertStatus(200)->assertExactJson([

            'data' => [

                'name' => 'example.com',
                'url' => 'http://example.com'


            ]


        ]);




        $this->assertDatabaseCount(Site::class,2);


    }



    /** @test */
    public function it_updates_site_data(){


        Site::create([

            'name' => 'example.com',
            'url' => 'http://example.com'

        ]);

        Site::create([

            'name' => 'a',
            'url' => 'abc'


        ]);





        $response = $this->putJson('api/sites/1',[

                    'name' => 'example2.com',
            'url' => 'http://example2.com'

        ]);

        $response->assertStatus(200)->assertExactJson([
            'data' => [

                'name' => 'example2.com',
                'url' => 'http://example2.com'

            ]


        ]);





        $this->assertDatabaseHas(Site::class,[
            'name' => 'example2.com',
            'url' => 'http://example2.com'

        ]);



    }



    /** @test */
    public function it_retrives_site_by_id(){

        Site::create([

            'name' => 'a',
            'url' => 'abc'


        ]);
        Site::create([

            'name' => 'b',
            'url' => 'abcd'


        ]);


        $response = $this->getJson('api/sites/2');

        $response->assertStatus(200)

           ->assertExactJson([

               'data' => [

                   'name' => 'b',
                   'url' => 'abcd'


               ]

           ]);



    }



    /** @test */
    public function it_deletes_site(){
        Site::create([

            'name' => 'a',
            'url' => 'abc'


        ]);
        Site::create([

            'name' => 'b',
            'url' => 'abcd'


        ]);


            $response = $this->deleteJson('api/sites/2');


            $response->assertStatus(200)
              ->assertExactJson([

                  'data' => [

                      'name' => 'b',
                      'url' => 'abcd'



                  ]


              ]);


            $this->assertDatabaseCount(Site::class,1);


    }




}