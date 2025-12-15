<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('email')->nullable();
            $table->string('email_one')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile_one')->nullable();
            $table->string('mobile_two')->nullable();
            $table->string('tagline')->nullable();
            $table->string('url')->nullable();
            $table->text('location')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('google')->nullable();
            $table->text('welcome')->nullable();
            $table->timestamps();
        });
        
        // Insert default record
        DB::table('sitesettings')->insert([
            'sitename' => 'Creation Office Fitouts',
            'url' => 'https://creationltd.co.ke',
            'email' => 'info@creationltd.co.ke',
            'mobile' => '+254 723 768 593',
            'location' => 'Nas Apartments, Laikipia Rd, Nairobi',
            'address' => 'P.O Box 0100 100',
            'facebook' => 'https://www.facebook.com/creationltd',
            'twitter' => 'https://twitter.com/creationoffice1',
            'instagram' => 'https://www.instagram.com/creation_office_fitout/',
            'linkedin' => 'https://www.linkedin.com/company/creation-office-fitouts/',
            'youtube' => 'https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sitesettings');
    }
};
