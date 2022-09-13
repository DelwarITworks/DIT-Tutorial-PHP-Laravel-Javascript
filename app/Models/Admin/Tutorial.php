<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;

class Tutorial extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
