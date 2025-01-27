<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'parent_comment_id', 'content','user_id','created_at'];
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
}
