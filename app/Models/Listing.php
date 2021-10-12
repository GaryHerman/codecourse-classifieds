<?php

namespace App\Models;

use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\PivotOrderableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;
    use OrderableTrait;
    use PivotOrderableTrait;

    // ------------------------------------------------------
    // Convenience Functions
    // ------------------------------------------------------

    public function live()
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
    // Perhaps something like (wont work as needs subquery), return $query->whereBetween('_lft', $area->getBounds());

    public function scopeInArea($query, Area $area)
    {
        return $query->whereIn('area_id', array_merge(
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

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoriteable');
    }

    public function favoritedBy(User $user)
    {
        if (is_null($user)) {
            return false;
        }

        return $this->favorites()->where('user_id', $user->id)->exists();
    }
}
