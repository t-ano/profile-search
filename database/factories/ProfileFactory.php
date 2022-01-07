<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'hcd7VrujELznb11kXZhyfEKZTfS7Y6v8ktpqUhU5.png',
            'kUU3TUZPMJDcCEDNZoL2lP1b7l8jJzYdF8R4H2z0.png',
            'NnhSxwHCilO7FNeNzapOerzBkTGtk8GidHBdrXvD.png',
            'oV7o2RBWzJ02f8xzN8RXwTWIdWJXW7G0XuUzqQiv.png',
            'smoZJzoJXRBz1nUYGGHH4JY6CDbT2Ln5lI9PNnPL.png',
            'tLF6eytnSTiygLXzaFtLqEVTjYsvfl8Hak7DkiWP.png',
            'UhZX7nr4JbbzWivKcFgTozas2RChxXqP75Jt6Lzs.png',
            'UN9XfgRlxxDoqxxlr4tRsqsq4H18oZdQdbMb9OGH.png',
            'v6F3UzRISubrNxNKuLB2lRmjja5wADokuQo2dH92.png',
            'wKP9jqab4U3CST5nzGXDWrLnu228fLKmdithmDux.png'
        ];

        return [
            'image' => 'images/' . $images[$this->faker->unique()->numberBetween(0, 9)],
            'name' => $this->faker->name(),
            'summary' => $this->faker->realText(200)
        ];
    }
}
