<div>
    <div class="row">
        <div class="col-md-6 p-1 rounded" style="background:rgb(255, 232, 232)">
            <p class="h6 text-danger bg-white p-1">دیدگاه های تایید نشده</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">کاربر</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">متن</th>
                        <th scope="col">ویرایش</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unapprovedComments as $unapprovedComment)
                        <tr>
                            <th scope="row">{{$unapprovedComment->user->id}}</th>
                            <td>
                                <a href="{{route('admin.users.edit' , $unapprovedComment->user->id)}}">
                                    {{$unapprovedComment->user->name}}
                                </a>
                            </td>
                            <td>{{$unapprovedComment->title}}</td>
                            <td>{{$unapprovedComment->text}}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.comments.edit' , $unapprovedComment->id) }}">ویرایش</a>                                </th>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">2</div>
        <div class="col-md-3">3</div>
    </div>
</div>
