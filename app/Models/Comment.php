<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['body',  'post_id',  'user_id'];

    public function post()
    {
        return $this->BelongsTo(Post::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
