<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_post_model';
    protected $fillable = [
        'judul',
        'slug',
        'category_id',
        'image',
        'content',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters["search"] ?? false, function($query, $search) {
            return $query->where("judul", "LIKE", "%" . $search . "%")->orWhere("content", "LIKE", "%" . $search . "%");
        });
    }
}
