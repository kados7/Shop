@extends('admin.layouts.admin')

@section('title')
 -ویرایش دیدگاه

@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">
        @include('admin.sections.errors')
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                <span>ویرایش دیدگاه |</span>
                <a class="btn btn-sm btn-success" href="{{route('admin.users.edit' , $comment->user->id)}}">
                    {{$comment->user->name}}
                </a>
                <span><a class="btn btn-sm btn-danger" href="{{url('/product/'.$comment->product->slug)}}">{{$comment->product->name}}</a></span>

                </h5>
            </div>
            <hr>
            <form action="{{ route('admin.comments.update' , ['comment'=>$comment->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form row">
                    <div class="form-group col-md-3 my-1">
                        <label for="name">عنوان</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{$comment->title}}">
                    </div>
                    <div class="form-group col-md-3 my-2">
                        <label for="is_active">توصیه شده توسط کاربر </label>
                        <select class="form-control" id="is_recommended" name="is_recommended">
                            <option value="1">توصیه شده</option>
                            <option value="0">توصیه نشده</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 my-2">
                        @if ($comment->approved)
                            <label class="text-success" for="is_active">وضعیت تایید</label>
                        @else
                            <label class="text-danger" for="is_active">وضعیت تایید</label>
                        @endif
                        <select class="form-control" id="approved" name="approved">
                            <option value="1" {{$comment->approved ? 'selected' : ''}}>تایید شده</option>
                            <option value="0" {{$comment->approved ? '' : 'selected'}}>تایید نشده</option>
                        </select>
                    </div>
                    <div class="form-group col-md-9 my-2">
                        <label for="is_active">متن</label>
                        <textarea style="font-size:13px" class="form-control" rows="3" name="text">{{$comment->text}}</textarea>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش دیدگاه</button>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
