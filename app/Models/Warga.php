<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = "wargas";

    protected $guarded = [""];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function payments()
{
    return $this->hasMany(Payment::class, 'warga_id', 'id');
}
}
