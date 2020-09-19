<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date')->nullable(false);

            $table->string('transaction_number',20)->nullable(false);

            $table->bigInteger('ledger_id')->unsigned();
            $table->foreign('ledger_id')->references('id')->on('ledgers');

            $table->bigInteger('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets');

            $table->bigInteger('voucher_id')->unsigned();
            $table->foreign('voucher_id')->references('id')->on('vouchers');

            $table->string('voucher_number')->nullable(true);
            $table->string('particulars')->nullable(true);

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');



            $table->decimal('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
