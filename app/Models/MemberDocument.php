<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDocument extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // protected $fillable = ['member_id','identification_image','identification_expiry_date','proof_of_residency_image','proof_of_residency_expiry_date'];
}
