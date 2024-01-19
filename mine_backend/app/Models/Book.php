<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //BOOK BELOG to category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function scopeFilter($query, $filters)
    {
        //if filters array has category, we should combine the query
        if (isset($filters['category']) && $filters['category'] !== 'all') {
            $query->whereHas('category', function ($catQuery) use ($filters) {
                $catQuery->where('name', $filters['category']);
            });
        }
    }
}
