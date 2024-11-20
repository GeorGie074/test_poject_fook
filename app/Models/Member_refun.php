<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_refun extends Model
{
    use HasFactory;

    protected $table = 'member_refuns'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'id';  // ตรวจสอบว่าใช้คีย์หลักที่ถูกต้อง
    protected $fillable = ['phone_no', 'name', 'email', 'level', 'current_points'];

   
}
