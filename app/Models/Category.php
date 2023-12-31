<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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
   		return $this->hasMany(Post::class);
   }

   public static function add($fields)
   {
        $category = new self;
        $category->fill($fields);
        $category->save();

        return $category;
   }

   public function edit($fields)
   {
       $this->fill($fields);
       $this->save();
   }
}
