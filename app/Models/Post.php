<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     *
     * @return string
     */
    public function comments()
    {
        $limit = getenv('SHOW_MORE_LIMIT');

        return $this
            ->hasMany(Comment::class)
            //->whereNull('parent_id')
            ->limit($limit)
            ->orderBy('created_at', 'DESC');
    }
}
