<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //для создания отдельной графы в таблице миграцией
    public function up(): void
    {
        Schema::table('order_product', function(Blueprint $table){
            $table->integer('count')->default(1)->after('product_id');//after добавляет графу после опрделенной колонки, в данном случае  product_id
        });
    }

    /**
     * Reverse the migrations.
     */
    //метод для удаления колонки count откатом миграции
    public function down(): void
    {
        Schema::table('order_product', function(Blueprint $table){
            $table->dropColumn('count');
        });
    }
};

