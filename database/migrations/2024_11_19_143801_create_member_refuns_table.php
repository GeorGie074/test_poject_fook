<?php

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_refuns', function (Blueprint $table) {
            $table->id();
            $table->string('phone_no'); // ใช้ string แทน varchar และแก้ชื่อคอลัมน์
            $table->string('name');     // ใช้ string สำหรับข้อความ
            $table->string('email');    // ใช้ string สำหรับอีเมล
            $table->integer('level');   // ใช้ integer แทน int
            $table->integer('current_points'); // ใช้ integer แทน int
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_refuns');
    }
};
