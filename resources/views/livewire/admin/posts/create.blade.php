<div>
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">افزودن پست جدید</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form wire:submit.prevent="store_post()" method="POST">
                @csrf

                <div class="form row">
                    <div class="form-group col-md-4">
                        <label for="title">عنوان</label>
                        <input wire:model="title" class="form-control" type="text">
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
                        <label for="thumbnail">تصویر</label>
                        <input wire:model="thumbnail" class="form-control" type="file">

                        @if ($thumbnail)
                            <img class="mt-2" width="80%" src="{{$thumbnail->temporaryUrl()}}">
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="body"> متن </label>
                        <textarea wire:model.lazy="body" class="form-control"></textarea>
                    </div>


                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

</div>
