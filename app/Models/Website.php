<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'website_user', 'website_id', 'user_id')->withTimestamps();
    }
}
