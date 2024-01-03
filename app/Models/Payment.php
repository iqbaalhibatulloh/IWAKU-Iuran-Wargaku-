<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

//   relation warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }

    // relation user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relation category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
