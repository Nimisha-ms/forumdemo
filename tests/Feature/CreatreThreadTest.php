<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Thread;
use App\Models\Reply;
class CreatreThreadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_an_authenticated_user_can_post_thread()
    {
       $this->be($user = User::factory()->create());
       $thread = Thread::factory()->make();
       $this->post('/threads', $thread->toArray());
       $this->get($thread->path());
    }
}
