<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('acct_profit_loss_report')) {
            Schema::create('acct_profit_loss_report', function (Blueprint $table) {
                $table->id('profit_loss_report_id');
                $table->unsignedBigInteger('account_type_id');
                $table->unsignedBigInteger('account_income_tax_id');
                $table->integer('report_no')->nullable();
                $table->unsignedBigInteger('account_id')->nullable();
                $table->string('account_code')->nullable();
                $table->string('account_name')->nullable();
                $table->string('report_formula')->nullable();
                $table->string('report_operator')->nullable();
                $table->integer('report_type')->nullable();
                $table->integer('report_tab')->nullable();
                $table->integer('report_bold')->nullable();
                $table->unsignedBigInteger('created_id')->nullable();
                $table->unsignedBigInteger('updated_id')->nullable();
                $table->unsignedBigInteger('deleted_id')->nullable();
                $table->timestamps();
                $table->softDeletesTz();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
