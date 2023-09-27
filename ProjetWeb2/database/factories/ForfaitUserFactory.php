<?php

namespace Database\Factories;

use App\Models\ForfaitUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForfaitUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ForfaitUser::class;

    public function definition()
    {
        return [
            // Define any additional attributes for the pivot table here if needed.
        ];
    }
}

