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
        Schema::create('trackersheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->string('account_owner');
            $table->string('parent_account');
            $table->string('chil_account');
            $table->string('parent_company');
            $table->string('line_manage');
            $table->string('contact_name');
            $table->string('position');
            $table->string('website');
            $table->string('stage');
            $table->string('probability');
            $table->string('revenue');
            $table->string('expected_revenue');
            $table->string('type');
            $table->string('quote_created');
            $table->string('customer_type');
            $table->string('product_name');
            $table->string('comments');
            $table->string('action_to_take');
            $table->string('last_contact_date');
            $table->string('next_contact_date');
            $table->string('expected_close_date');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackersheets');
    }
};
