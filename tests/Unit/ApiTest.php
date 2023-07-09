<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;

class ApiTest extends TestCase
{
use RefreshDatabase;
    /**
     * A basic unit test example.
     */
           public function testListRecordsForSpecificOrganization()
           {
               // Create a user
               $user = User::factory()->create();


               $events = Event::factory(5)->create(['organization_id' => $user->id]);


               Sanctum::actingAs($user);

               $response = $this->get('/api/list');

               $response->assertStatus(200);
           }

           public function testSingleSpecificOrganization()
              {
                          // Create a user
              $user = User::factory()->create();


              $events = Event::factory(1)->create(['organization_id' => $user->id]);


              Sanctum::actingAs($user);

              $response = $this->get("/api/".$events[0]->id);

              $response->assertStatus(200);
              }

              public function testDeleteSingleSpecificOrganization()
                {
                                                // Create a user
                  $user = User::factory()->create();


                  $events = Event::factory(1)->create(['organization_id' => $user->id]);


                 Sanctum::actingAs($user);

                  $response = $this->get("/api/".$events[0]->id);

                   $response->assertStatus(200);
                    }

                      public function testPatchSingleSpecificOrganization()
                          {
                                                                                            // Create a user
                                    $user = User::factory()->create();


                                    $events = Event::factory(1)->create(['organization_id' => $user->id]);


                                     Sanctum::actingAs($user);
                                     $response = $this->patch("/api/".$events[0]->id,['event_title'=>'dasdas','event_start_date'=>'11-11-2022','event_end_date'=>'11-12-2022']);


                                      $response->assertStatus(200);
                           }
                   public function testPutSingleSpecificOrganization()
                    {
                                                                                                            // Create a user
                    $user = User::factory()->create();


                     $events = Event::factory(1)->create(['organization_id' => $user->id]);


                     Sanctum::actingAs($user);
                     $response = $this->put("/api/".$events[0]->id,['event_title'=>'dasdas','event_start_date'=>'11-11-2022','event_end_date'=>'11-12-2022']);

                      $response->assertStatus(200);
                      }

}
