<?php

use App\Models\User;
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
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(1)->comment('0 bloqueado - 1 liberado - 2 pendente');
            $table->tinyInteger('type')->default(0)->comment('0-Cliente - 1-Funcionario - 2-Supervisor 8-Gerente 9-Administrador');
            $table->string('name',50);
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->uuid('uid')->nullable();
            //
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->newADM('Fabio','fabio@doitall.com.br','123456');
        $this->newADM('Pedro','pivow@doitall.com.br','123456');
        $this->newADM('Lucas', 'lucas@doitall.com', '123456');
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

    public function newADM($name,$user,$pass,$type=9){
        $cad = new User();
        $cad->name = $name;
        $cad->email = $user;
        $cad->password = bcrypt($pass);
        $cad->type = $type;
        $cad->status = 1;
        $cad->save();
    }

}
