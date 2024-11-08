<?php

namespace App\Models;

use App\Models\WebAboutsGambar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebAbouts extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function image()
    {
        return $this->HasMany(WebAboutsGambar::class, 'idabouts','id');
    }
}
