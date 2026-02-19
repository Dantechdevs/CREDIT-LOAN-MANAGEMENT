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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('target')->default('All');
            $table->string('full_name');
            $table->string('id_no')->unique();
            $table->string('mobile_no')->unique();
            $table->string('branch')->nullable();
            $table->decimal('scored_amount', 12, 2)->default(0);
            $table->enum('record_status', ['Pending', 'Approved', 'Deactivated'])->default('Pending');
            $table->unsignedBigInteger('registered_by')->nullable();
            $table->timestamps();

            $table->foreign('registered_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
