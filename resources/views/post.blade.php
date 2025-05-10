
<div class="post-wrapper" data-aos="zoom-in-up">
    <div class="post-left">
        <div class="post-author">
            <img src="images/images1.png" alt="Author" class="post-author-img" />
            <span class="post-author-text"> {{ $post->writer }} | {{ $post->date }} </span>
        </div>
        <a href="#" class="post-content group">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p class="post-excerpt truncate">{{ $post->body }}</p>
        </a>

        <div class="post-footer">
            <span class="text-sm">
                <a href="#" class="post-tag">{{ $post->category_id }}</a> | {{ $post->read }}
            </span>
            <label class="cursor-pointer" data-postid="{{ $post->id }}">
                <span class="showLikes">{{ $post->likes_count }}</span> &nbsp; <span>{{ $post->view }}</span>
                @auth
                    @if(in_array($post->id, $arr_posts))
                        <input type="checkbox" name="like" checked onchange="_like(this)" class="like-checkbox peer">
                    @else
                        <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox">
                    @endif
                @endauth
                @guest
                    <input type="checkbox" name="like" onclick="error()" class="like-checkbox" />
                @endguest
                <div class="like-icon-wrapper">
                    <i class="like-icon fa fa-heart"></i>
                </div>
            </label>
        </div>
    </div>
    <a href="#" class="post-thumbnail-link">
        <img src="{{ $post->image }}" alt="Post Thumbnail" class="post-thumbnail-img" />
    </a>
</div>
