<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد گروه کاربری (نقش)</h5>
            </div>
            <hr>
            @include('admin.sections.errors')

            <form wire:submit.prevent="createRole()">
                <div class="form-row">
                    <div class="form-group col-md-3 my-2">
                        <label for="name">نام</label>
                        <input wire:model.defer="name" class="form-control" name="name" type="text" value="{{ old('name') }}">
                    </div>
                    {{-- <!-- Accordion -->
                    <div class="accordion accordion-flush" id="accordionPermissions">
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

                <button type="submit" class="btn btn-outline-primary mt-5 mr-3">ثبت</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form
        </div>

    </div>
</div>
