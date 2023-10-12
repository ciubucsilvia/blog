<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory;

    use Sluggable;

    protected $fillable = ['title'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts()
    {
    	return $this->belongsToMany(
    		Post::class,
    		'posts_tags',
    		'tag_id',
    		'post_id'
    	);
    }

    public static function add($fields)
    {
        $tag = new self;
        $tag->fill($fields);
        $tag->save();

        return $tag;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
