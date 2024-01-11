<?php

namespace Database\Factories;


use App\Models\AcctJournalVoucher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcctJournalVoucher>
 */
class AcctJournalVoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AcctJournalVoucher::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'branch_id' => $this->faker->randomNumber(3),
            'client_id' => null, // Adjust as needed
            'transaction_module_id' => null, // Adjust as needed
            'journal_voucher_status' => $this->faker->randomElement([0, 1]),
            'transaction_module_code' => $this->faker->word,
            'transaction_journal_id' => null, // Adjust as needed
            'transaction_journal_no' => $this->faker->word,
            'journal_voucher_no' => $this->faker->word,
            'journal_voucher_period' => $this->faker->word,
            'journal_voucher_date' => $this->faker->date(),
            'journal_voucher_title' => $this->faker->sentence,
            'journal_voucher_description' => $this->faker->paragraph,
            'journal_voucher_token' => Str::random(10),
            'reverse_state' => $this->faker->boolean,
            'pickup_status' => $this->faker->boolean,
            'created_id' => $this->faker->randomNumber(),
            'updated_id' => $this->faker->randomNumber(),
            'deleted_id' => null, // Adjust as needed
        ];
        
        // return [
        //     'journal_voucher_status' => $faker->numberBetween(0, 1),
        //     'transaction_module_code' => $faker->word,
        //     'transaction_journal_id' => $faker->numberBetween(1, 100),
        //     'transaction_journal_no' => $faker->word,
        //     'journal_voucher_no' => $faker->word,
        //     'journal_voucher_period' => $faker->word,
        //     'journal_voucher_date' => $faker->date(),
        //     'journal_voucher_title' => $faker->sentence,
        //     'journal_voucher_description' => $faker->paragraph,
        //     'journal_voucher_token' => $faker->word,
        //     'reverse_state' => $faker->boolean,
        //     'pickup_status' => $faker->boolean,
        //     'created_id' => $faker->numberBetween(1, 10),
        //     'updated_id' => $faker->numberBetween(1, 10),
        //     'deleted_id' => null,
        //     'created_at' => $faker->dateTimeThisMonth,
        //     'updated_at' => $faker->dateTimeThisMonth,
        //     'deleted_at' => null,
        // ];
    }
}