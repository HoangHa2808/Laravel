<?php

namespace App\Models;

use App\Models\Posts\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';

    protected $fillable = [
        'hotel_id',
        'user_id',
        'user_name',
        'feedback',
    ];
    protected $with = ['hotel'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
}
