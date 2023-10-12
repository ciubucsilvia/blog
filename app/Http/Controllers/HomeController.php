<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(2);

        /**
            TOT CODUL ASTA E IN --- AppProvider
        **/
        // $popularPosts = $this->getPopularPosts();

        // $featuredPosts = $this->getFeaturedPosts();

        // $recentPosts = $this->getRecentPosts();

        // $categories = Category::all();

        return view('pages.index', 
            compact(
                'posts'
                // 'popularPosts',
                // 'featuredPosts',
                // 'recentPosts',
                // 'categories'
            ));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->where('status', 1)->paginate(3);

        return view('pages.list', compact('posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->paginate(3);

        return view('pages.list', compact('posts'));
    }
}
