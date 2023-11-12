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
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->integer('contact_phone1');
            $table->integer('contact_phone2');
            $table->integer('contact_phone3');
            $table->integer('contact_phone4');
            $table->string('contact_email1',30);
            $table->string('contact_email2',30);
            $table->string('contact_email3',30);
            $table->string('contact_email4',30);
            $table->text('contact_address1');
            $table->text('contact_address2');
            $table->text('contact_address3');
            $table->text('contact_address4');
            $table->integer('contact_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
