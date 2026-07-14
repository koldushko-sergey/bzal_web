<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiquidationItem extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'price',
        'contact_info', 'sort_order', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_published' => 'boolean',
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('sort_order');
    }
}
