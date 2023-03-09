<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                {{-- <h5 class="font-weight-bold mb-3 mb-md-0">لیست تیکت ها ({{ $ticket_statuses->total() }})</h5> --}}
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticket_statuses as $key => $ticket_status)
                            <tr>
                                <th>
                                    {{ $ticket_status->id }}
                                </th>
                                <th>
                                    {{ $ticket_status->name }}
                                </th>
                                <th>
                                    {{ $ticket_status->created_at }}
                                </th>


                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.ticketpriorities.edit', $ticket_status->id) }}">
                                        ویرایش
                                    </a>
                                    <button wire:click="distroyTicketPriority({{$ticket_status->id}})" class="btn btn-sm btn-danger">
                                        حذف
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <h3>ایجاد وضعیت جدید</h3>
                @include('admin.sections.errors')

                <form wire:submit.prevent="creatTicketStatus()" method="POST">

                    <div class="form row">
                        <div class="col-md-4">
                            <label for="name">نام</label>
                            <input wire:model="ticket_status_name" class="form-control" type="text"">
                        </div>

                        <div class="col-md-4 mt-4">
                            <button class="btn btn-outline-primary" type="submit">ایجاد وضعیت جدید</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $ticket_statuses->render() }}
            </div>

        </div>

    </div>
</div>
