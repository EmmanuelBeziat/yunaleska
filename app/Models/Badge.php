<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'icon',
        'condition_type',
        'condition_data',
    ];

    protected function casts(): array
    {
        return [
            'condition_data' => 'array',
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges')
            ->withPivot('unlocked_at')
            ->withTimestamps();
    }
}
