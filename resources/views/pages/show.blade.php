@extends('layout')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                    <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            @if($post->hasCategory())
                                <h6><a href="{{route('category.show', $post->category->slug)}}"> {{ $post->getCategoryTitle() }}</a></h6>
                            @else
                                <h6><a href="#"> {{ $post->getCategoryTitle() }}</a></h6>
                            @endif
                            <h1 class="entry-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h1>


                        </header>
                        <div class="entry-content">
                        	{!! $post->content !!}
                        </div>
                        <div class="decoration">
                        	@foreach($post->tags as $tag)
                            	<a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                            @endforeach
                        </div>

                        <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">By {{$post->author->name}} On {{ $post->getDate() }}</span>

                        </div>
                    </div>
                </article>
                <div class="top-comment"><!--top comment-->
                    <img src="/images/comment.jpg" class="pull-left img-circle" alt="">
                    <h4>Rubel Miah</h4>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                        invidunt ut labore et dolore magna aliquyam erat.</p>
                </div><!--top comment end-->
                <div class="row"><!--blog next previous-->
                    <div class="col-md-6">
                        <div class="single-blog-box">
                        	@if($post->hasPrevious())
                            <a href="{{ route('post.show', $post->getPrevious()->slug) }}">
                                <img src="{{ $post->getPrevious()->getImage() }}" alt="">

                                <div class="overlay">

                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5>{{ $post->getPrevious()->title }}</h5>
                                    </div>
                                </div>


                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                        	@if($post->hasNext())
                            <a href="{{ route('post.show', $post->getNext()->slug) }}">
                                <img src="{{$post->getNext()->getImage()}}" alt="">

                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-right fa fa-angle-right"></i></p>
                                        <h5>{{$post->getNext()->title}}</h5>

                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div><!--blog next previous end-->
                <div class="related-post-carousel"><!--related post carousel-->
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="items">
                        @foreach($post->related() as $item)
                            <div class="single-item">
                            <a href="{{ route('post.show', $item->slug) }}">
                            <img src="{{ $item->getImage() }}" alt="">

                                    <p>{{ $item->title }}</p>
                                </a>
                            </div>
                        @endforeach


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-2.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-3.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-1.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>

                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-2.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>


                        <div class="single-item">
                            <a href="#">
                                <img src="/images/related-post-3.jpg" alt="">

                                <p>Just Wondering at Beach</p>
                            </a>
                        </div>
                    </div>
                </div><!--related post carousel-->
                @if($post->comments->isNotEmpty())
                    <div class="bottom-comment"><!--bottom comment-->
                        <!-- <h4>3 comments</h4> -->
                        @foreach($post->getComments() as $comment)

                        <div class="comment-img">
                            <img class="img-circle" src="{{$comment->author->getAvatar()}}" alt="" width="75">
                        </div>

                        <div class="comment-text">
                            <!-- <a href="#" class="replay btn pull-right"> Replay</a -->
                            <h5>{{$comment->author->name}}</h5>

                            <p class="comment-date">
                                {{$comment->created_at->diffForHumans()}}
                            </p>


                            <p class="para">{{$comment->text}}</p>
                        </div>
                        @endforeach
                    </div>
                @endif
                <!-- end bottom comment-->

                @if(Auth::check())
                    <div class="leave-comment"><!--leave comment-->
                        <h4>Leave a reply</h4>


                        <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                            {{csrf_field()}}
                            <input type="hidden" name="post_id" value={{$post->id}}>
                            <div class="form-group">
                                <div class="col-md-12">
    										<textarea class="form-control" rows="6" name="message"
                                                      placeholder="Write Massage"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn send-btn" value="Post Comment">
                            
                        </form>
                    </div><!--end leave comment-->
                @endif
            </div>
            @include('pages._sidebar')
        </div>
    </div>
</div>
@endsection