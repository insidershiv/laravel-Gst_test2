<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billitems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('item_name');
            $table->string('item_type');
            $table->integer('item_qty')->default(0);
            $table->integer('rate');
            $table->integer('sgst')->default(0);
            $table->integer('cgst')->default(0);
            $table->integer('igst')->default(0);
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->string('invoice_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
            $table->integer('item_total');
            $table->integer('hsn_sac');
            $table->integer("sgst_rate")->default(0);
            $table->integer("cgst_rate")->default(0);
            $table->integer("igst_rate")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billitems');
    }
}
