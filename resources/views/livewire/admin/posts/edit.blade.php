<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-row mb-4 text-md-right">
                <img class="card-img-top" style="width: 100px"
                                src="{{ url(env('POST_THUMBNAILS_UPLOAD_PATH') . $post->thumbnail) }}"
                                alt="{{ $post->name }}" >
                <h5 class="font-weight-bold">ویرایش : {{ $post->title }}</h5>
                <button wire:click="destroyPost({{ $post->id }})" class="btn btn-danger mx-3" type="submit">حذف پست</button>

            </div>
            <hr>

            @include('admin.sections.errors')

            <form wire:submit.prevent="updatePost()" method="POST">

                <div class="form row">
                    <div class="form-group col-md-4">
                        <label for="title">نام</label>
                        <input wire:model="title" class="form-control" type="text"">
                    </div>


                    <div class="form-group col-md-4 my-2 rounded p-1" style="background:rgba(209, 209, 209, 0.26)">

                        <label for="post_category_id">موضوع</label>
                        <select wire:model.defer="post_category_id" class="form-control my-1">
                            @foreach ($post_category_ids as $post_category_id)
                                <option value="{{$post_category_id->id}}">{{$post_category_id->name}}</option>
                            @endforeach
                        </select>

                        @if ($showNewCategoryDiv)
                            <div class="d-flex flex-row justify-content-between mt-1">
                                <input wire:model="new_category_name" type="text" class="form-control">
                                <button wire:click="storeCategory()" class="btn btn-sm btn-outline-primary mx-1" type="button">
                                    افزودن
                                </button>
                            </div>
                        @endif
                        <button wire:click="$toggle('showNewCategoryDiv')" class="btn btn-sm mt-1" type="button">+ افزودن موضوع</button>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="thumbnail_old">تغییر تصویر</label>
                        <input wire:model="thumbnail_new" class="form-control" type="file">

                        @if ($thumbnail_new)
                            <img class="mt-2" width="80%" src="{{$thumbnail_new->temporaryUrl()}}">
                        @else
                            <img class="mt-2" width="80%" src="{{ url(env('POST_THUMBNAILS_UPLOAD_PATH') . $post->thumbnail) }}">
                        @endif

                    </div>



                    {{--  Description SECTION --}}
                    <div class="form-group col-md-7 mt-2 ">
                        <label for="body">توضیحات</label>
                        <textarea wire:model.lazy="body" class="form-control" rows="8"></textarea>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

</div>
