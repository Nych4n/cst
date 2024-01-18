<?php

namespace Database\Factories;


use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\AcctJournalVoucher;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $twoYearsAgo = Carbon::now()->subYears(2); 
        $currentDate = Carbon::now(); 
        $randomDate = $faker->dateTimeBetween($twoYearsAgo, $currentDate)->format('Y-m-d');
        return [
            'branch_id' => $this->faker->randomElement([0, 1]),
            'client_id' => null, 
            'transaction_module_id' => $this->faker->randomElement([1, 2]), 
            'journal_voucher_status' => $this->faker->randomElement([0, 1]),
            'transaction_module_code' =>"JU",
            'transaction_journal_id' => null, 
            'transaction_journal_no' => null,
            'journal_voucher_no' => $this->faker->word,
            'journal_voucher_period' => $this->faker->randomNumber(5),
            'journal_voucher_date' => $randomDate,
            'journal_voucher_title' => $this->faker->sentence,
            'journal_voucher_description' => $this->faker->paragraph,
            'journal_voucher_token' => null,
            'reverse_state' => $this->faker->boolean,
            'pickup_status' => $this->faker->boolean,
            'created_at' => $faker->dateTimeThisMonth,
            'updated_at' => $faker->dateTimeThisMonth,
            'deleted_id' => null, 
        ];
        
       
    }
}