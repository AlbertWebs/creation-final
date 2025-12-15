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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('client')->nullable()->after('title');
            $table->string('image_one')->nullable()->after('image');
            $table->string('image_two')->nullable()->after('image_one');
            $table->string('image_three')->nullable()->after('image_two');
            $table->string('image_four')->nullable()->after('image_three');
            $table->string('image_five')->nullable()->after('image_four');
            $table->string('image_six')->nullable()->after('image_five');
            $table->string('image_seven')->nullable()->after('image_six');
            $table->string('image_eight')->nullable()->after('image_seven');
            $table->string('image_nine')->nullable()->after('image_eight');
            $table->string('image_ten')->nullable()->after('image_nine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'client',
                'image_one',
                'image_two',
                'image_three',
                'image_four',
                'image_five',
                'image_six',
                'image_seven',
                'image_eight',
                'image_nine',
                'image_ten',
            ]);
        });
    }
};
