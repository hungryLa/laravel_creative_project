<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Filterable;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = [];

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }
}
