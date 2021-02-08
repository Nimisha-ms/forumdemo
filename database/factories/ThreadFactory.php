<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),                   
            'channel_id' => \App\Models\Channel::factory()->create()->id,                   
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
