<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    public function definition(): array
    {
        return [
            'user_id'          => User::factory(),
            'title'            => $this->faker->title(),
            'description'      => $this->faker->text(),
            'published_at'     => Carbon::now(),
            'last_notified_at' => Carbon::now(),
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now(),
        ];
    }
}
