<div>
    <div class="row p-5 mx-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>
        <div class="col-md-10 py-3 px-5">

            <table class="table table-borderless mx-auto table-rounded ">
                <thead>
                    <tr class="rounded" style="background:#EBF2FA " >
                        <th scope="col">دپارتمان</th>
                        <th scope="col">زمان ارسال</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">اولویت</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="my-3">
                        <td>{{$ticket->category->name}}</td>
                        <td>{{verta($ticket->created_at)}}</td>
                        <td>{{$ticket->status->name}}</td>
                        <td>{{$ticket->priority->name}}</td>
                    </tr>
                </tbody>

            </table>
            <div class="col-md-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
                <span style="font-size:16px"> نام : {{$ticket->user->name}} </span>
            </div>
            <div class="col-md-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
                <span style="font-size:16px"> ایمیل : {{$ticket->user->email}} </span>
            </div>
            <hr class="my-4">
            <h2>{{$ticket->title}}</h2>


            <div class="row mt-5">
                <div class="col-md-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80%" height="80%" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <br>
                    {{$ticket->user->name}}
                </div>
                <div style="background : #c7c7c7" class="col-md-11 p-4 position-relative rounded-pill">
                    <p style="color:#494949 ; font-size:14px">{{$ticket->body}}</p>
                    <div class="position-absolute top-100 start-0 my-1">
                        <p class="ps-5" style="font-size: 12px">{{verta($ticket->created_at)}}</p>
                    </div>
                </div>
            </div>


            @foreach ($ticket->comments as $comment)
                <div class="row mt-5">
                    <div class="col-md-1 {{$comment->user == $ticket->user ? 'order-first' : 'order-last'}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80%" height="80%" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                        <br>
                        <span class="text-danger">{{$comment->user->name}}</span>
                        <br>
                        {{-- <span class="text-info">{{$comment->user->roles->first()->name}}</span> --}}
                    </div>
                    <div style="background : {{$comment->user == $ticket->user ? '#c7c7c7' : '#b0caca60'}} " class="col-md-11 p-4 position-relative rounded-pill">
                        <p style="color:# ; font-size:14px">{{$comment->body}}</p>
                        <div class="position-absolute top-100 start-0 my-1">
                            <p class="ps-5" style="font-size: 12px">{{verta($comment->created_at)}}</p>
                        </div>
                    </div>
                </div>


            @endforeach
        <div class="container mt-4">
            <div class="row">
                @if ($ticket->status->id == 5)
                    <div class="alert alert-info mt-5" role="alert">
                        وضعیت تیکت به بسته شده تغییر یافته است
                    </div>
                @else
                    @include('admin.sections.errors')

                    <form wire:submit.prevent="store_ticket_comment()">
                        <div class="form row">
                            <div class="form-group col-md-12 mb-3">
                                <label class="h4" for="answer">پاسخ</label>
                                <textarea wire:model="ticket_comment_body"
                                        class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <button type="submit" class="btn btn-sm btn-danger">ارسال</button>
                            <button wire:click="close_ticket()" type="button" class="btn btn-sm btn-success">بستن تیکت به عنوان حل شده</button>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>

</div>
