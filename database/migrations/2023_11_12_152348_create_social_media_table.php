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
        Schema::create('social_media', function (Blueprint $table) {
            $table->bigIncrements('socialMedia_id');
            $table->string('socialMedia_facebook',150);
            $table->string('socialMedia_linkedin',150);
            $table->string('socialMedia_instagram',150);
            $table->string('socialMedia_telegram',150);
            $table->string('socialMedia_twitter',150);
            $table->string('socialMedia_whatsapp',150);
            $table->string('socialMedia_reddit',150);
            $table->string('socialMedia_weixin',150);
            $table->string('socialMedia_discord',150);
            $table->string('socialMedia_youtube',150);
            $table->integer('socialMedia_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
