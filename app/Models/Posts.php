<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public const PUBLISHED =1;
    public const INACTIVE = 2;
    public const DRAFT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'post_updated_at' => 'datetime',
    ];
    

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        return [
            self::PUBLISHED    => 'Publicado',
            self::DRAFT => 'Borrador',
            self::INACTIVE  => 'Inactivo'
        ];
    }

    /**
     * Returns label of actual status

     * @param string
     */
    public function statusLabel()
    {
        $list = self::listStatus();

        // little validation here just in case someone mess things
        // up and there's a ghost status saved in DB
        return isset($list[$this->status]) 
            ? $list[$this->status] 
            : $this->status;
    }

    /**
     * Get the publish is active.
     */

    public function isPublished(): bool
    {
        return $this->status === self::PUBLISHED;
    }

    /**
     * Get the publish is a draft.
     */
    public function isDraft(): bool
    {
        return $this->status === self::DRAFT;
    }

    /**
     * Get the publish is inative.
     */

    public function isInactive(): bool
    {
        return $this->status === self::INACTIVE;
    }

}
