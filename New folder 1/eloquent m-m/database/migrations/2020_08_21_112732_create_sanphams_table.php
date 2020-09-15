<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_sp');
            $table->string('hinh anh');
            $table->unsignedInteger('danhmuc_id');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('danhmuc_id')->references('id')->on('danhmucs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
}
