<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('acct_account_balance', function (Blueprint $table) {
            $table->increments('account_balance_id');
            $table->unsignedInteger('branch_id')->nullable(); 
            $table->unsignedInteger('account_id')->nullable(); 
            $table->decimal('last_balance', 20, 2)->default(0.00);
            $table->unsignedInteger('created_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // $table->tinyInteger('data_state')->default(0);

            // $table->foreign('account_id')
            //       ->references('account_id')
            //       ->on('acct_account')
            //       ->onDelete('set null')
            //       ->onUpdate('cascade');

            // $table->foreign('branch_id')
            //       ->references('branch_id')
            //       ->on('core_branch')
            //       ->onDelete('set null')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acct_account_balance');
    }
};

