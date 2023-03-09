<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                {{-- <h5 class="font-weight-bold mb-3 mb-md-0">لیست تیکت ها ({{ $ticket_categories->total() }})</h5> --}}
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th class="text-white bg-success">نام پرمیژنی که توانایی پاسخ به هر دسته را میدهد</th>
                            <th class="text-white bg-danger">توانایی پرمیژن</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticket_categories as $key => $ticket_category)
                            <tr>
                                <th>
                                    {{ $ticket_category->id }}
                                </th>
                                <th>
                                    {{ $ticket_category->name }}
                                </th>
                                <th>
                                    {{ $ticket_category->permission->name }}
                                </th>
                                <th>
                                    {{ $ticket_category->permission->ability }}
                                </th>


                                <th>
                                    <button wire:click="distroyticket_category({{$ticket_category->id}})" class="btn btn-sm btn-danger">
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
                <h3>ایجاد دسته بندی (دپارتمان) جدید</h3>
                @include('admin.sections.errors')

                <form wire:submit.prevent="creatTicketCategory()" method="POST">

                    <div class="form row">
                        <div class="col-md-4">
                            <label for="name">نام</label>
                            <input wire:model="ticket_category_name" class="form-control" type="text"">
                        </div>

                        <div class="form-group col-md-4 my-2 rounded p-1" style="background:rgba(209, 209, 209, 0.26)">

                            <label for="post_category_id">اجازه دسترسی به</label>
                            <select wire:model.defer="permission_id" class="form-control my-1">
                                @foreach ($permissions as $permission)
                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mt-4">
                            <button class="btn btn-outline-primary" type="submit">ایجاد دسته بندی (دپارتمان) جدید</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $ticket_categories->render() }}
            </div>

        </div>

    </div>
</div>
