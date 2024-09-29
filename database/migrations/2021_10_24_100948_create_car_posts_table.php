<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\CarColor;
use App\Enums\CarFuelType;
use App\Enums\CarRegistrationType;
use App\Enums\CarTransmission;

class CreateCarPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_posts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            // Product info
            $table->string('identify');
            $table->string('title');
            $table->integer('price');
            $table->char('currency', 6)->default('VND');
            $table->smallInteger('transmission'); // Enum
            $table->smallInteger('body_type'); // Enum
            $table->smallInteger('fuel_type')->default(CarFuelType::Other); // Enum
            $table->smallInteger('current_color')->default(CarColor::Other); // Enum
            $table->smallInteger('seat');
            $table->smallInteger('state');

            // Post info
            $table->date('registration_date')->nullable();
            $table->smallInteger('registration_type')->nullable();
            $table->integer('current_mileage')->nullable();
            $table->boolean('spare_key')->default(false);
            $table->boolean('principal_warranty')->default(false);
            $table->date('principal_warranty_exp_date')->nullable();
            $table->boolean('service_book')->default(false);

            $table->unsignedBigInteger('user_id')->index();
            // $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('car_model_id')->index();
            // $table->foreign('car_model_id')->references('id')->on('car_models');

            // Delete status
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
        Schema::dropIfExists('car_posts');
    }
}
