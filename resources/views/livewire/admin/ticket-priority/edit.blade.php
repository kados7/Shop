<div>
    <!-- Content Row -->
    {{-- {{dd($ticketPriority->name)}} --}}
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-row mb-4 text-md-right">

                <h5 class="font-weight-bold">ویرایش : {{ $ticketPriority->name }}</h5>
                {{-- <button wire:click="destroyPost({{ $ticketPriority->id }})" class="btn btn-danger mx-3" type="submit">حذف پست</button> --}}

            </div>
            <hr>

            {{-- @include('admin.sections.errors')

            <form wire:submit.prevent="updatePost()" method="POST">

                <div class="form row">
                    <div class="form-group col-md-4">
                        <label for="name">نام</label>
                        <input wire:model="name" class="form-control" type="text"">
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form> --}}
        </div>

    </div>

</div>
