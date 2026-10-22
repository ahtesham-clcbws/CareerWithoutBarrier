<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_counters', function (Blueprint $table) {
            $table->id();
            $table->string('slot_key')->unique();
            $table->string('top_title')->nullable();
            $table->unsignedInteger('counter_value')->default(0);
            $table->boolean('has_plus_icon')->default(false);
            $table->string('bottom_title')->nullable();
            $table->unsignedTinyInteger('order')->default(1);
            $table->timestamps();
        });

        // Seed the 4 initial existing counters
        DB::table('homepage_counters')->insert([
            [
                'slot_key' => 'scholarship_counter',
                'top_title' => '100% Scholarship for',
                'counter_value' => 1500,
                'has_plus_icon' => true,
                'bottom_title' => 'Applicants',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slot_key' => 'institutes_counter',
                'top_title' => 'Offered Institutes',
                'counter_value' => 250,
                'has_plus_icon' => true,
                'bottom_title' => 'Institutes (Approx)',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slot_key' => 'form_fee_counter',
                'top_title' => 'Zero Form Fee For',
                'counter_value' => 20000,
                'has_plus_icon' => false,
                'bottom_title' => 'Applicants',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slot_key' => 'free_education_counter',
                'top_title' => 'Free online education for',
                'counter_value' => 100000,
                'has_plus_icon' => true,
                'bottom_title' => 'Students',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_counters');
    }
};
