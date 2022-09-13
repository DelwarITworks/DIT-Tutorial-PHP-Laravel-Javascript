<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Tutorial;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Tutorial()
    {
        return $this->hasMany(Tutorial::class);
    }
}
