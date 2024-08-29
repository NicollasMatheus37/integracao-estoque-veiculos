<?php

use App\Enums\ImportLogStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('import_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('original_file_name');
            $table->string('filename');
            $table->string('mime_type');
            $table->integer('processed_items')->default(0);
            $table->integer('error_items')->default(0);
            $table->enum('status', ImportLogStatusEnum::toArray());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_logs');
    }
};
