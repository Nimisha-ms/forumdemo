<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\User;


class ThreadTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $thread;

    public function setUp() : void {    
    	parent::setUp();
    	$this->thread = Thread::factory()->create();
    }
    public function test_a_thread_has_replies()
    {
       // $thread = Thread::factory()->create();        
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$this->thread->replies);        
    }

    public function a_thread_has_creater(){
    	//$thread = Thread::factory()->create(); 
    	 $this->assertInstanceOf(Thread::class,$this->thread->creator);
    }

    public function test_a_thread_can_add_a_replay(){
    	$this->thread->addReply([
    		'body' => 'Foobar',
    		'user_id'=>1
    	]);

    	$this->assertCount(1, $this->thread->replies);
    }

}
