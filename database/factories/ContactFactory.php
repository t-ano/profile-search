<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement([2, 3]),
            'content' => $this->faker->realText($this->faker->numberBetween(10, 200)),
            'send_datetime' => $this->faker->dateTimeBetween('1day', '3month')->format('Y-m-d H:i')
        ];
    }
}
