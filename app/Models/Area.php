<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Area extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
