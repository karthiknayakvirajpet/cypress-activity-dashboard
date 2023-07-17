<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivity extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'user_activities';

    //relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship with Activity model
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
