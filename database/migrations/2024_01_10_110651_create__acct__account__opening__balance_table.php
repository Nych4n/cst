<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcctAccountOpeningBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acct_account_opening_balance', function (Blueprint $table) {
            $table->id('account_opening_balance_id');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->decimal('opening_balance', 20, 2)->default(0.00);
            $table->string('month_period', 2)->default('0');
            $table->year('year_period')->nullable();
            $table->integer('created_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acct_account_opening_balance');
    }
}