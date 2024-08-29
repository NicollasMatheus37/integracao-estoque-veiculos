<?php

use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('register_id');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('version');
            $table->string('color');
            $table->bigInteger('mileage');
            $table->enum('fuel', FuelEnum::toArray());
            $table->enum('transmission', TransmissionEnum::toArray());
            $table->tinyInteger('doors_qtt');
            $table->float('price', 3);
            $table->timestamp('date');
            $table->json('options');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
