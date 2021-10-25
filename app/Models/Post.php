<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'website_id',
        'title',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id', 'id');
    }
}
