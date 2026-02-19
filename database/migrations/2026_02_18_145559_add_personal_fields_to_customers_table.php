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
        Schema::table('customers', function (Blueprint $table) {
            // Step 1 - Personal Info
            $table->string('type')->nullable(); // Individual/Business
            $table->string('pf_number')->nullable();

            $table->string('title')->nullable(); // Mr/Mrs/Miss
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('gender')->nullable();
            $table->date('dob')->nullable();

            $table->string('email')->nullable();
            $table->string('tax_pin')->nullable();

            $table->string('alternative_phone')->nullable();

            $table->string('identity_type')->nullable(); // National ID/Passport
            $table->string('identity_number')->nullable();

            $table->string('marital_status')->nullable();

            $table->string('industry_type')->nullable();
            $table->string('business_type')->nullable();

            $table->string('income_range')->nullable();
            $table->string('customer_source')->nullable();

            $table->boolean('is_employed')->default(false);

            // relationship officer + referee + guarantor
            $table->string('relationship_officer')->nullable();
            $table->string('referee')->nullable();
            $table->string('guarantor')->nullable();
            $table->string('customer_category')->nullable();
            $table->decimal('max_prequalified_amount', 15, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {

            if (Schema::hasColumn('customers', 'type')) {
                $table->dropColumn('type');
            }

            if (Schema::hasColumn('customers', 'pf_number')) {
                $table->dropColumn('pf_number');
            }

            if (Schema::hasColumn('customers', 'title')) {
                $table->dropColumn('title');
            }

            if (Schema::hasColumn('customers', 'first_name')) {
                $table->dropColumn('first_name');
            }

            if (Schema::hasColumn('customers', 'middle_name')) {
                $table->dropColumn('middle_name');
            }

            if (Schema::hasColumn('customers', 'last_name')) {
                $table->dropColumn('last_name');
            }

            if (Schema::hasColumn('customers', 'gender')) {
                $table->dropColumn('gender');
            }

            if (Schema::hasColumn('customers', 'dob')) {
                $table->dropColumn('dob');
            }

            if (Schema::hasColumn('customers', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('customers', 'tax_pin')) {
                $table->dropColumn('tax_pin');
            }

            if (Schema::hasColumn('customers', 'alternative_phone')) {
                $table->dropColumn('alternative_phone');
            }

            if (Schema::hasColumn('customers', 'identity_type')) {
                $table->dropColumn('identity_type');
            }

            if (Schema::hasColumn('customers', 'identity_number')) {
                $table->dropColumn('identity_number');
            }

            if (Schema::hasColumn('customers', 'marital_status')) {
                $table->dropColumn('marital_status');
            }

            if (Schema::hasColumn('customers', 'industry_type')) {
                $table->dropColumn('industry_type');
            }

            if (Schema::hasColumn('customers', 'business_type')) {
                $table->dropColumn('business_type');
            }

            if (Schema::hasColumn('customers', 'income_range')) {
                $table->dropColumn('income_range');
            }

            if (Schema::hasColumn('customers', 'customer_source')) {
                $table->dropColumn('customer_source');
            }

            if (Schema::hasColumn('customers', 'is_employed')) {
                $table->dropColumn('is_employed');
            }

            if (Schema::hasColumn('customers', 'relationship_officer')) {
                $table->dropColumn('relationship_officer');
            }

            if (Schema::hasColumn('customers', 'referee')) {
                $table->dropColumn('referee');
            }

            if (Schema::hasColumn('customers', 'guarantor')) {
                $table->dropColumn('guarantor');
            }

            if (Schema::hasColumn('customers', 'customer_category')) {
                $table->dropColumn('customer_category');
            }

            if (Schema::hasColumn('customers', 'max_prequalified_amount')) {
                $table->dropColumn('max_prequalified_amount');
            }
        });
    }
};
