<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Thread;
use App\Models\Reply;

class ThreadsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

   public function setUp() : void {
        parent::setUp();
        //$this->thread = factory('App\Models\Thread')->create();
        $this->thread = Thread::factory()->create();
   }

    public function test_if_a_user_can_browse_threads()
    {        
        //$thread = Thread::factory()->create();

        //$response->assertStatus(200);

        $this->get('/threads')        
            ->assertSee($this->thread->title);

    }

    function test_a_user_can_read_single_thread(){
        //$thread = Thread::factory()->create();        

        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    function test_a_user_can_read_that_are_associated_with_a_thread()
    {
        $reply = Reply::factory()
            ->create(['thread_id' => $this->thread->id]);
        
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);
    }
}
