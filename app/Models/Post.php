<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Topic;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = [];

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function Tags(){
        return $this->belongsToMany(Tag::class,'post_tags');
    }
}
