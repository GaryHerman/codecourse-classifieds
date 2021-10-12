<?php

namespace App\Models;

use App\Traits\Eloquent\OrderableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;
    use OrderableTrait;

    // ------------------------------------------------------
    // Convenience Functions
    // ------------------------------------------------------

    public function isLive()
    {
        return $this->live;
    }

    public function cost()
    {
        return $this->category->price;
    }

    // ------------------------------------------------------
    // Scopes
    // ------------------------------------------------------

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }

    public function scopeIsNotLive($query)
    {
        return $query->where('live', false);
    }

    public function scopeFromCategory($query, Category $category)
    {
        return $query->where('category_id', $category->id);
    }

    // TODO: Should be looking for the Area in-between rgt and lft values not like this
    public function scopeInArea($query, Area $area)
    {
        return $query->where('area_id', array_merge(
            [$area->id], $area->descendants->pluck('id')->toArray()
        ));
    }

    // ------------------------------------------------------
    // Relationships
    // ------------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
