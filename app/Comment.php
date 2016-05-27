<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment wherePostId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'comment'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
