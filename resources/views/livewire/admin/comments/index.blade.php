<div>
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold"> دیدگاه ها ({{ $comments->total() }})</h5>
            </div>
            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>محصول</th>
                            <th>کاربر</th>
                            <th>عنوان</th>
                            <th>متن</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <th>
                                    {{ $comment->id }}
                                </th>
                                <th>
                                    <a href="{{route('home.products.show' , $comment->product->slug)}}">
                                        {{substr( $comment->product->name , 0 , 25)}}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{route('admin.users.edit' , $comment->user->id)}}">
                                        {{$comment->user->name}}
                                    </a><br>
                                    @if ($comment->is_recommended)
                                        <span class="text-success">
                                            توصیه شده
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            توصیه نشده
                                        </span>
                                    @endif
                                </th>
                                <th>
                                    {{ $comment->title }}
                                </th>

                                <th>
                                    <textarea style="font-size:13px" class="form-control" rows="3" readonly>{{$comment->text}}</textarea>
                                </th>
                                <th>
                                    @if ($comment->approved)
                                    <span class="text-success">
                                        تایید شده
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        تایید نشده
                                    </span>
                                    @endif

                                    <input wire:model.defer="approved.{{ $comment->id }}" class="form-check-input" type="checkbox">
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.comments.edit' , ['comment' => $comment->id]) }}">ویرایش</a>
                                    <button wire:click="delete({{$comment->id}})" class="btn btn-sm btn-danger" type="button">حذف</button>
                                </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <a wire:click="approve_selected()" class="btn btn-sm btn-primary">اعمال تغییرات</a>
                                @if ($approve_submited)
                                    ثبت شد !
                                @endif
                            </th>
                            <th></th>

                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
