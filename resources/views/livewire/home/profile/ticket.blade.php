<div>
    <div class="row p-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>

        <div class="col-md-10 py-3 px-5">

            <button class="btn btn-sm btn-danger my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTicket-new" aria-expanded="false" aria-controls="collapseTicket-new">
                افزودن تیکت جدید
            </button>
            @include('admin.sections.errors')

            <div class="collapse" id="collapseTicket-new">
                <div class="card card-body my-2">
                    {{-- NEW Ticket Sektion --}}

                    <form wire:submit.prevent="store_new_ticket()">
                        <div class="form row">
                            <div class="form-group col-md-3 mb-3">
                                <input wire:model.defer="title" type="text"
                                        class="form-control" placeholder="عنوان تیکت">
                            </div>

                            <div class="form-group col-md-3 mb-3">
                                <select wire:model.defer="ticket_category_id"class="form-control">
                                    <option>دسته بندی تیکت</option>
                                    @foreach ($ticket_categories as $ticket_category)
                                        <option value="{{$ticket_category->id}}">{{$ticket_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 mb-3">
                                <select wire:model.defer="product_id"class="form-control">
                                    <option> محصول مرتبط تیکت</option>
                                    @foreach ($products_search as $searchProduct)
                                        <option value="{{$searchProduct->id}}">{{$searchProduct->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                           <div class="form-group col-md-3 mb-3">
                                <select wire:model.defer="ticket_priority_id"class="form-control">
                                    <option>تعیین اولویت</option>
                                    @foreach ($ticket_priorities as $ticket_priority)
                                        <option value="{{$ticket_priority->id}}">{{$ticket_priority->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-12 mb-3">
                                <textarea wire:model.defer="body"
                                        class="form-control" >پیام شما</textarea>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">ذخیره</button>
                    </form>

                    {{--END - NEW Ticket Sektion --}}


                </div>
              </div>

            <div>
                <span class="text-black h5"> تیکت های شما ({{$tickets->total()}})</span>
            </div>

            @if ($tickets->count() == 0)
                <div class="mt-4">
                    <span class="text-muted h6">هیچ تیکتی ثبت نشده است</span>
                </div>
            @else
            <div class="mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان درخواست</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">ارجحیت درخواست</th>
                            <th scope="col">تاریخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket )
                        <tr>
                            <th scope="row">{{$ticket->id}}</th>
                            <td><a href="{{route('home.user_profile.ticket.show', $ticket->slug)}}">{{ $ticket->title }}</a></td>
                            <td>{{$ticket->status->name}}</td>
                            <td>{{$ticket->priority->name}}</td>
                            <td>{{verta($ticket->updated_at)->format('%d %B، %Y') }}</td>
                            <td>

                            </td>

                        </tr>


                      @endforeach

                    </tbody>

                  </table>

            </div>

            @endif


        </div>
    </div>
</div>
