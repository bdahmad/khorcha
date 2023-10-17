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
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->bigIncrements('expense_cate_id');
            $table->string('expense_cate_name',50)->unique();
            $table->string('expense_cate_remarks',50)->nullable();
            $table->integer('expense_cate_creator')->nullable();
            $table->integer('expense_cate_editor')->nullable();
            $table->string('expense_cate_slug',50)->nullable();
            $table->integer('expense_cate_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_categories');
    }
};
