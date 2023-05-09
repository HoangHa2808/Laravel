<?php

namespace App\Models\Posts;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';

    protected $fillable = [
        'category_id',
        'postType_id',
        'title',
        'slug',
        'discount',
        'ratting',
        'thumbnail',
        'short_description',
        'description',
        'published',
        'posted_date',
        'modified_date',
    ];
    protected $with = ['category'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'hotel_id', 'id');
    }
}
