<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    const IS_ALLOW = 0;
    const IS_DISALLOW = 1;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = self::IS_ALLOW;
        $this->save();
    }

    public function disallow()
    {
        $this->status = self::IS_DISALLOW;
        $this->save();
    }

    public function toogleStatus()
    {
        if($this->status == self::IS_DISALLOW) {
            return $this->allow();
        }
        
        return $this->disallow();   
    }

    public function remove()
    {
        $this->delete();
    }
}
