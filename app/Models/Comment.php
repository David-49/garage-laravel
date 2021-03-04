<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = ['content', 'user_id', 'annoncement_id'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function announcement() 
    {
        return $this->belongsTo(Announcement::class);
    }

}
