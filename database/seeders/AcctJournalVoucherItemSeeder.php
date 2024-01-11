<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcctJournalVoucher;
use App\Models\AcctJournalVoucherItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcctJournalVoucherItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcctJournalVoucherItem::factory()->count(3)
        ->has(AcctJournalVoucher::factory()->count(1),'journal')
        ->create();
    }
}