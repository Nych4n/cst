<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcctAccountBalanceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acct_account_balance_detail', function (Blueprint $table) {
            $table->id('account_balance_detail_id');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->bigInteger('transaction_id')->nullable();
            $table->integer('transaction_type')->nullable();
            $table->string('transaction_code', 20)->nullable();
            $table->date('transaction_date')->nullable();
            $table->integer('pickup_status')->default(1);
            $table->decimal('opening_balance', 20, 2)->default(0.00);
            $table->decimal('account_in', 20, 2)->default(0.00);
            $table->decimal('account_out', 20, 2)->default(0.00);
            $table->decimal('cash_in', 20, 2)->default(0.00);
            $table->decimal('cash_out', 20, 2)->default(0.00);
            $table->decimal('bank_in', 20, 2)->default(0.00);
            $table->decimal('bank_out', 20, 2)->default(0.00);
            $table->decimal('last_balance', 20, 2)->default(0.00);
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
        Schema::dropIfExists('acct_account_balance_detail');
    }
}