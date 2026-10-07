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
        Schema::table('wandelings', function (Blueprint $table) {
            $table->text('meeting_info')->nullable()->after('location');
            $table->dateTime('end_of_hike')->nullable()->after('date_of_hike');
            $table->text('practical_info')->nullable();
            $table->string('map_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wandelings', function (Blueprint $table) {
            $table->dropColumn(['meeting_info', 'end_of_hike', 'practical_info', 'map_image']);
        });
    }
};
