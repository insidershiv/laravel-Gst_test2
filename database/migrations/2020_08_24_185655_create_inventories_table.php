<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('item_name');
            $table->string('item_type');
            $table->integer('item_price');
            $table->integer('item_stock')->nullable();
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('item_hsn_sac');
            $table->integer('item_tax_slab')->nullable();
            $table->boolean('item_exemption')->default(false);
            $table->longText('item_exemption_reason')->nullable();
            $table->unique(['item_id','item_hsn_sac']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
