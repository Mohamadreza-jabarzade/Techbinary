<main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">


    {{--        show alerts here--}}
    @include('partials.alert')

    <!-- Header -->
    <header class="flex justify-between flex-row items-center mb-5 p-5">
        <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-comment ml-3"></i>کامنت ها</i>
        </h1>
    </header>

    <!-- Table -->
    <section class="flex-1 overflow-hidden rounded-2xl">
        <div class="h-full overflow-y-auto space-y-5 p-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-light-text-Primary">

                <div id="search"
                     class="flex flex-row items-center text-center bg-light-text-soft h-8 w-52 rounded-md px-2 my-3 mr-3">
                    <input type="text" oninput="search(this.value)" placeholder="جستوجو..."
                           class="w-44 text-right h-full px-2 outline-none border-none placeholder:text-right">
                    <i class="fa fa-search w-5"></i>
                </div>


                <table dir="rtl" class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-sm text-center uppercase bg-sky-900 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">ای دی</th>
                        <th scope="col" class="px-6 py-3">نویسنده</th>
                        <th scope="col" class="px-6 py-3">متن</th>
                        <th scope="col" class="px-6 py-3">پست</th>
                        <th scope="col" class="px-10 py-3">تاریخ</th>
                        <th scope="col" class="px-6 py-3">عملیات</th>
                    </tr>
                    </thead>
                    <tbody id="rows">
                    <!-- Row 1 -->
                    @foreach($comments as $comment)
                        <tr>
                            <th scope="row">{{$comment->id}}</th>
                            <td>{{$comment->author}}</td>
                            <td data-search="on">{{$comment->content}}</td>
                            <td class="max-w-40">
                                <p class="hover:bg-red-200  truncate max-w-32"><a href="{{route('showPostDetail',$comment->post->title)}}">{{ $comment->post->title ?? 'عنوان یافت نشد' }}</a></p>
                            </td>
                            <td>{{$comment->status == 'pending' ? 'در انتظار تایید' : 'تایید شده'}}</td>
                            <td class="px-2 w-72 py-4">
                                <div class="flex text-center justify-center items-center gap-2">
                                    @if($comment->status == 'pending')
                                            <button wire:click="accept({{ $comment->id }})" class="bg-green-500 admin-table-btn td-action">
                                                تایید
                                            </button>
                                    @endif
                                        <button wire:click="delete({{ $comment->id }})" class="bg-red-500 admin-table-btn td-action">
                                            حذف
                                        </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h3 id="noResult" class="hidden text-center mx-auto text-lg text-red-600 my-2">چیزی پیدا نشد
                </h3>
            </div>
        </div>
    </section>
</main>
