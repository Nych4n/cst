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
        if(!Schema::hasTable('system_menu')) {
            Schema::create('system_menu', function (Blueprint $table) {
                $table->integer('id_menu');
                $table->primary('id_menu');
                $table->string('id',100)->nullable();
                $table->enum('type',['folder','file','function'])->nullable();
                $table->string('text',50)->nullable();
                $table->string('parent',50)->nullable();
                $table->string('image',50)->nullable();
                $table->string('menu_level',50)->nullable();
                $table->softDeletesTz();
            });
            DB::table('system_menu')->insert([
               [ 'id_menu' => 1,  'id' => 'index',              'type' => 'file','text' => 'Beranda','parent' => "#",'menu_level' => "1",],
               [ 'id_menu' => 2,  'id' => 'client',             'type' => 'file','text' => 'Client','parent' => "#",'menu_level' => "1",],
               [ 'id_menu' => 3,  'id' => 'product',            'type' => 'file','text' => 'Produk','parent' => "#",'menu_level' => "1",],
               [ 'id_menu' => 8,  'id' => '#',                  'type' => 'folder','text' => 'Akutansi','parent' => "#",'menu_level' => "1",],
               [ 'id_menu' => 81, 'id' => 'journal',            'type' => 'file','text' => 'Jurnal Umum','parent' => "8",'menu_level' => "2",],
               [ 'id_menu' => 82, 'id' => 'journal-memorial',   'type' => 'file','text' => 'Jurnal Memorial','parent' => "8",'menu_level' => "2",],
               [ 'id_menu' => 9,  'id' => '#',                  'type' => 'folder','text' => 'Preferensi','parent' => "#",'menu_level' => "1",],
               [ 'id_menu' => 91, 'id' => 'product-type',       'type' => 'file','text' => 'Tipe Produk','parent' => "9",'menu_level' => "2",],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('system_menu');
    }
};
