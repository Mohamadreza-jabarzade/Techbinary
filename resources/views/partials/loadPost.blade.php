<div class="post-wrapper" data-aos="zoom-in-up">
    <!-- Left Content -->
    <div class="post-left">

        <!-- Top Section -->
        <div class="post-author">
            <img src="/images/images1.png" alt="Author" class="post-author-img" />
            <span class="post-author-text"> {{ $post->writer }}  |  </span> <span>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
        </div>

        <!-- Main Content -->
        <a href="{{route('showPostDetail',$post->title)}}" class="post-content group">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p class="post-excerpt truncate">
                {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 200, '...') !!}

            </p>
        </a>

        <!-- Bottom Section -->
        <div class="post-footer">
            <span class="text-[12px] md:text-sm"> <a href="#" class="post-tag">{{ $post->category->name }}</a><span><b class="px-1">|</b>{{ $post->read_time }}</span></span>
            <div class="flex gap-3">
                <label class="cursor-pointer" data-postid="">
                    <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox peer" />
                    <div class="icon-wrapper">
                        <i class="like-icon fa fa-heart-o"></i>
                    </div>
                </label>
                <label class="cursor-pointer" data-postid="">
                    <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox peer" />
                    <div class="icon-wrapper">
                        <i class="save-icon fa fa-bookmark-o"></i>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <span class="showLikes">{{ $post->likes_count }}</span> &nbsp; <span>{{ $post->view }}</span>
    <!-- Image Preview -->
    <a href="#" class="post-thumbnail-link">
        <img src="{{asset('storage/' . $post->image)}}" alt="Post Thumbnail" class="post-thumbnail-img" />
    </a>
</div>

{{--ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd--}}

{{--<div class="post-wrapper" data-aos="zoom-in-up">--}}
{{--    <div class="post-left">--}}
{{--        <div class="post-author">--}}
{{--            <img src="/images/images1.png" alt="Author" class="post-author-img" />--}}
{{--            <span class="post-author-text"> {{ $post->writer }} | {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} </span>--}}
{{--        </div>--}}
{{--        <a href="#" class="post-content group">--}}
{{--            <h1 class="post-title">{{ $post->title }}</h1>--}}
{{--            <p class="post-excerpt truncate">{!! $post->body !!}</p>--}}
{{--        </a>--}}

{{--        <div class="post-footer">--}}
{{--            <span class="text-sm">--}}
{{--                <a href="#" class="post-tag">{{ $post->category->name }}</a> | {{ $post->read_time }}--}}
{{--            </span>--}}
{{--            <label class="cursor-pointer" data-postid="{{ $post->id }}">--}}
{{--                <span class="showLikes">{{ $post->likes_count }}</span> &nbsp; <span>{{ $post->view }}</span>--}}
{{--                @auth--}}
{{--                    @if(in_array($post->id, $arr_posts))--}}
{{--                        <input type="checkbox" name="like" checked onchange="_like(this)" class="like-checkbox peer">--}}
{{--                    @else--}}
{{--                        <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox">--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--                @guest--}}
{{--                    <input type="checkbox" name="like" onclick="error()" class="like-checkbox" />--}}
{{--                @endguest--}}
{{--                <div class="like-icon-wrapper">--}}
{{--                    <i class="like-icon fa fa-heart"></i>--}}
{{--                </div>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <a href="#" class="post-thumbnail-link">--}}
{{--        <img src="{{asset('storage/' . $post->image)}}" alt="Post Thumbnail" class="post-thumbnail-img" />--}}
{{--    </a>--}}
{{--</div>--}}
