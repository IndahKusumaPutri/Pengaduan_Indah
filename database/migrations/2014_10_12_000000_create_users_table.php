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
            $table->string('nik', 17);
            $table->string('name', 50);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->char('telp', 12)->nullable();
            $table->enum('jenkel', ['laki-laki','perempuan'])->nullable();
            $table->string('role')->default('masyarakat')->nullable();
            $table->text('alamat')->nullable();
            $table->char('rt', 4)->nullable();
            $table->char('rw', 4)->nullable();
            $table->char('kode_pos', 5)->nullable();
            $table->char('province_id', 2)->nullable();
            $table->char('regency_id', 4)->nullable();
            $table->char('district_id', 10)->nullable();
            $table->char('village_id', 10)->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        // Schema::table('users', function (Blueprint $table) 
        // {
        //     $table->dropForeign('users_role_id_foreign');
        //     $table->dropColumn('role_id');
        // });
    }
}
