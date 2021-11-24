<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUMKMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_m_k_m_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('name');
            $table->text('address');
            $table->text('village_id');
            $table->text('district_id');
            $table->text('regency_id');
            $table->text('province_id');
            $table->text('owner_name');
            $table->text('business_type');
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
        Schema::dropIfExists('u_m_k_m_s');
    }
}
