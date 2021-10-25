<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'email'
    ];


    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'website_user', 'user_id', 'website_id')->withTimestamps();
    }
}
