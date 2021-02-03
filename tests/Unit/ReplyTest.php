<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\User;

class ReplyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    function test_it_has_an_owner(){

    	$reply = Reply::factory()->create();

    	$this->assertInstanceOf(User::class,$reply->owner);
    }
}
