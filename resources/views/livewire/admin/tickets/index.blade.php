<div>
    <!-- Content Row -->
    {{-- {{dd($tickets)}} --}}
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست تیکت ها ({{ $tickets->total() }})</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کاربر</th>
                            <th>عنوان</th>
                            <th>دپارتمان</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        @foreach ($tickets as $ticket)
                            <tr>
                                <th>
                                    {{ $ticket->id }}
                                </th>
                                <th>
                                    {{ $ticket->user->name }}
                                </th>
                                <th>
                                    {{ $ticket->title }}
                                </th>
                                <th>
                                    {{ $ticket->category->name }}
                                </th>
                                <th style="background : {{$ticket->color}}">
                                    {{ $ticket->status->name }}
                                </th>
                                <th>
                                    {{ $ticket->priority->name }}
                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.tickets.show', ['ticket' => $ticket->id]) }}">
                                        نمایش
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{-- {{ $tickets->render() }} --}}
            </div>

        </div>

    </div>
</div>
