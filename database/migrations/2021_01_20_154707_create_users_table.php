<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bedrijfsID');
            $table->string('naam');
            $table->string('voornaam');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isAdmin');
            $table->boolean('isChauffeur');
            $table->boolean('isReceptionist');
            $table->boolean('isLogistiek');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('bedrijfsID')->references('id')->on('bedrijfs')->onDelete('cascade')->onUpdate('cascade');

        });

        DB::table('users')->insert(
            [
                [
                    'bedrijfsID' => 1,
                    'naam' => 'Doe',
                    'voornaam' => 'Joe',
                    'email' => 'john.doe@example.com',
                    'password' => Hash::make('user1234'),
                    'isAdmin' => false,
                    'isChauffeur' => true,
                    'isReceptionist' => false,
                    'isLogistiek' => false,
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'bedrijfsID' => 1,
                    'naam' => 'admin',
                    'voornaam' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin1234'),
                    'isAdmin' => true,
                    'isChauffeur' => false,
                    'isReceptionist' => true,
                    'isLogistiek' => false,
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'bedrijfsID' => 1,
                    'naam' => 'chauffeur',
                    'voornaam' => 'chauffeur',
                    'email' => 'chauffeur@example.com',
                    'password' => Hash::make('user1234'),
                    'isAdmin' => false,
                    'isChauffeur' => true,
                    'isReceptionist' => false,
                    'isLogistiek' => false,
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'bedrijfsID' => 1,
                    'naam' => 'logistiek',
                    'voornaam' => 'logistiek',
                    'email' => 'logistiek@example.com',
                    'password' => Hash::make('admin1234'),
                    'isAdmin' => false,
                    'isChauffeur' => false,
                    'isReceptionist' => false,
                    'isLogistiek' => true,
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],

                [
                    'bedrijfsID' => 1,
                    'naam' => 'receptionist',
                    'voornaam' => 'receptionist',
                    'email' => 'receptionist@example.com',
                    'password' => Hash::make('user1234'),
                    'isAdmin' => false,
                    'isChauffeur' => false,
                    'isReceptionist' => true,
                    'isLogistiek' => false,
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
