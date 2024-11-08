<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebHomes extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gambar()
    {
        return $this->hasMany(WebHomesGambar::class, 'idHomes','id');
    }
}
