<?php

namespace LakM\Commenter\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use LakM\Commenter\ModelResolver as M;
use LakM\Commenter\Models\Concerns\HasOwner;
use LakM\Commenter\Models\Concerns\HasProfilePhoto;

/**
 * @property string $commenter_type
 * @property mixed $commenter_id
 * @property string $text
 * @property string $guest_name
 * @property string $guest_email
 * @property string $ip_address
 * @property bool $approved
 * @property mixed $reply_ip
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Reply extends Message
{
    use HasOwner;
    use HasProfilePhoto;

    protected $fillable = [
        'commenter_type',
        'commenter_id',
        'text',
        'approved',
        'reply_id'
    ];


    public function comment(): BelongsTo
    {
        return $this->belongsTo(M::commentClass());
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
