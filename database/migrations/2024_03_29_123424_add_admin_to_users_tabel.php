<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_tabel', function (Blueprint $table) {
            $password = Hash::make('00000000');
            DB::table('users')->insert([
                ['name' => 'samer', 'email' => 'samer@gmail.com','password'=> $password,'is_admin'=>'1'],
    
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_tabel', function (Blueprint $table) {
            //
        });
    }
};
