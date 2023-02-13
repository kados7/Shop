<div>
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست کاربران ({{ $users->total() }})</h5>

            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>نقش کاربر و مجوز ها</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>
                                    {{ $user->id }}
                                </th>
                                <th>
                                    {{ $user->name }}
                                </th>
                                <th>
                                    @foreach ($user->roles as $role)
                                        <span class="text-danger">{{ $role->name }}</span>
                                    @endforeach
                                    <br>
                                    {{-- @foreach ($user->permissions as $permission)
                                        {{ $permission->name }} {{$loop->last ? '' : ','}}
                                    @endforeach --}}
                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-info mr-3" href="{{ route('admin.users.edit' , ['user' => $user->id]) }}">ویرایش</a>                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
