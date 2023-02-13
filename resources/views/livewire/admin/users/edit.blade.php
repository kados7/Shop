<div>
    <!-- Content Row -->
    <div class="row">
        @include('admin.sections.errors')
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">ویرایش کاربر - {{$user->name}}</h5>
            </div>
            <hr>
            <form wire:submit.prevent="UpdateUser({{$user->id}})">
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">نام</label>
                        <input wire:model.defer="name" class="form-control" name="name" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="email">ایمیل</label>
                        <input wire:model.defer="email" class="form-control" name="email" type="email">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="role">نقش کاربر</label>
                        <select wire:model.defer="role" class="form-control" name="role" id="role">
                            <option></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <!-- Accordion -->
                    <div class="accordion accordion-flush my-2" id="accordionPermissions">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <!-- Accordion Button -->
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    مجوز های دسترسی
                                </button>
                            </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <!-- Accordion Body -->
                            <div class="accordion-body row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <input wire:model.defer="selected_permissions.{{$permission->id}}" type="checkbox" class="form-check-input"
                                            id="permission_{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label mr-3" for="permission_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>
</div>
