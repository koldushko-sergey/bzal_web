<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'type', 'name', 'email', 'phone', 'company', 'unp',
        'message', 'ip_address', 'is_read',
    ];

    protected function casts(): array
    {
        return ['is_read' => 'boolean'];
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'citizen_appeal' => 'Обращение гражданина',
            'business_appeal' => 'Обращение юр. лица / ИП',
            'contact' => 'Сообщение с сайта',
            default => $this->type,
        };
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
