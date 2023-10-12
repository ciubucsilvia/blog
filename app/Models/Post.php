<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Category;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 
        'content', 
        'date',
        'description'
    ];
    
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    
    const IS_FEATURED = 1;
    const IS_STANDATD = 0;

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
    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(
            Tag::class,
            'posts_tags',
            'post_id',
            'tag_id'
        );
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::id();
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function uploadImage($image)
    {
        if($image == null){
            return;
        }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if($this->image != null)
            Storage::delete('uploads/'. $this->image);
    }

    public function setImage($value='')
    {
        # code...
    }

    public function getImage()
    {
        if($this->image == null){
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function setCategory($id)
    {
        if($id == null){
            return;
        }

        // $category = Category::find($id);
        // $this->category()->save($category);
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if($ids == null){
            return;
        }

        $this->tags()->sync($ids);
    }

    public function toggleStatus($value)
    {
        if($value == null){
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setDraft()
    {
        $this->status = self::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = self::IS_PUBLIC;
        $this->save();
    }

    public function toogleFeatured($value)
    {
        if($value == null){
            return $this->setStandard();
        }

        return $this->setFeatured();
    }

    public function setFeatured()
    {
        $this->is_featured = self::IS_FEATURED;
        $this->save();
    }

    public function setStandard()
    {
        $this->is_featured = self::IS_STANDATD;
        $this->save();
    }

    public function setDateAttribute($value) 
    {
        $date = new Carbon($value);
        // $date =  Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        $this->attributes['date'] = date($date);
        // $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
        $this->attributes['date'] = $date;
    }

    public function getCategoryTitle()
    {
        return isset($this->category)
            ? $this->category->title
            : 'No category';
    }

    public function getTags()
    {
        return $this->tags->isNotEmpty()
            ? $this->tags->implode('title', ', ')
            : 'No tags';
    }

    public function hasCategory()
    {
        return isset($this->category)
            ? true
            : false;
    }

    public function getDate()
    {
        $date = new Carbon($this->date);
        $date->format('F d, Y');
        return $date;
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postId = $this->hasPrevious();
        return self::find($postId);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views', 'DESC')
                    ->take(3)
                    ->get();
    }

    public static function getFeaturedPosts()
    {
        return self::where('is_featured', 1)
                    ->take(3)
                    ->get();
    }

    public static function getRecentPosts()
    {
        return self::orderBy('date', 'ASC')
                    ->take(4)
                    ->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
