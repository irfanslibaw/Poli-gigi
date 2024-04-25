<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('no_hp')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->default('dokter');
        });

        // Hash the password before storing it
        $hashedPassword = Hash::make('12345678');

        // Insert a new dokter
        \DB::table('dokters')->insert([
            'nik' => '123456789',
            'nama' => 'Dr. Boyke',
            'no_hp' => '081234567890',
            'email' => 'Boyke@gmail.com',
            'password' => $hashedPassword,
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
        Schema::dropIfExists('dokters');
    }
};
