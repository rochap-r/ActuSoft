<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['body',  'post_id',  'user_comment_id'];

    public function post()
    {
        return $this->BelongsTo(Post::class);
    }
    public function userComment()
    {
        return $this->BelongsTo(UserComment::class);
    }
}
