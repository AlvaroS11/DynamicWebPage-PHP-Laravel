<?php

namespace Database\Factories;

use App\Models\Posts_imgs;
use Illuminate\Database\Eloquent\Factories\Factory;

class Posts_imgsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts_imgs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'file_path' => $this->faker->numberBetween(1,10) . ".png",
            'post_id'=> $this->faker->numberBetween(1,12)
        ];
    }

    
}
