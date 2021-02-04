<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Thread;
use App\Models\Reply;

class ParticipateInForumTest extends TestCase
{
    function unauthenticated_users_may_not_add_replies(){
        $this->expectException('Illuminate\Auth\AuthenticationException');
        /*$thread = Thread::factory()->create();
        $reply = Reply::factory()->create();
        $this->post($thread->path().$thread->id.'/replies', $reply->toArray());*/

        $this->post('threads/1/replies', []);
    }



    /**
     * A basic feature test example.
     *
     * @return void
     */
   function test_an_authenticated_user_may_participtate_in_forum_threads()
   {        
        $this->be($user = User::factory()->create());
        $user = User::factory()->create();
        $thread = Thread::factory()->create();

        $reply = Reply::factory()->create();
        $this->post('/threads/'.$thread->id.'/replies', $reply->toArray());

        $this->get('/threads/'.$thread->id)
            ->assertSee($reply->body);
   }
}
