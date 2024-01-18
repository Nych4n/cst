<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoreOffice>
 */
class CoreOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => function () {
                return DB::table('core_branch')->inRandomOrder()->first()->branch_id;
            },
            'user_id' => function () {
                return DB::table('system_user')->inRandomOrder()->first()->user_id;
            },
            'office_code' => $this->faker->unique()->regexify('[A-Za-z0-9]{6}'),
            'office_name' => $this->faker->company,
        ];
    }
}
