<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{
    protected $table = 'trades';

    public function seller() : BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function buyer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function elephpant()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function scopeAccepted(Builder $query) : Builder
    {
        return $query->where('accepted', '=', 1);
    }

    public function scopeNotAccepted(Builder $query) : Builder
    {
        return $query->where('accepted', '=', 0);
    }

    public function scopeCompleted(Builder $query) : Builder
    {
        return $query->where('received', '=', 1);
    }

    public function scopeNotCompleted(Builder $query) : Builder
    {
        return $query->where('received', '=', 0);
    }

    public function scopeAcceptedAt(Builder $query)
    {
        return $query->where('accepted_at', '=', null);
    }

    public function scopeByPostId(Builder $query, int $postId)
    {
        return $query->where('post_id', '=',  $postId);
    }

    public function scopeById(Builder $query, int $id)
    {
        return $query->where('id', '=', $id);
    }
}
