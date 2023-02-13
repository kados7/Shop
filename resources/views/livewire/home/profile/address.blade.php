<div>
    <div class="row p-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>

        <div class="col-md-10 py-3 px-5">
            <div>
                <span class="text-black h5">آدرس ها</span>
            </div>

            <div class="mt-4">
                <div class="d-flex flex-row justify-content-between">
                    <button wire:click="$set('submit_new_address' , true)" class="btn btn-sm btn-outline-danger">
                        افزودن آدرس جدید
                    </button>
                </div>
                @if ($submit_new_address)
                <span class="text-black h6">آدرس جدید</span>
                @include('admin.sections.errors')

                    <form wire:submit.prevent="store_address()">
                        <div class="form row">
                            <div class="form-group col-md-3 mb-3">
                                <label for="name">عنوان</label>
                                <input wire:model.defer="title" type="text"
                                        class="form-control" placeholder="منزل ، محل کار یا ...">
                            </div>
                            <div class="form-group col-md-2 mb-3">
                                <label for="name">شماره تماس</label>
                                <input wire:model.defer="cellphone" type="text"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-2 mb-3">
                                <label for="postal_code">کد پستی</label>
                                <input wire:model.defer="postal_code" type="number"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-2 mb-3">
                                <label for="province_id">استان</label>
                                <input wire:model.defer="province_id"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-2 mb-3">
                                <label for="city_id">شهر</label>
                                <input wire:model.defer="city_id"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="address">آدرس</label>
                                <textarea wire:model="address"
                                        class="form-control" ></textarea>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">ذخیره</button>
                    </form>
                    <hr class="my-3">
                @endif
                @foreach ($addresses as $address )

                <div class="row my-5">
                    <div class="col-md-5">
                        <h6 class="text-black">{{1 + $loop->index}} - {{$address->title}}</h6>
                        <div class="my-3">
                            <p>{{$address->address}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <span class="text-muted">کد پستی : </span>
                        <span>{{$address->postal_code}}</span><br>

                        <span class="text-muted"> شماره تماس : </span>
                        <span>{{$address->cellphone}}</span><br>
                    </div>
                    <div class="col-md-1">
                        <button wire:click="delete_address({{$address->id}})" class="btn btn-danger btn-sm">حذف</button>
                    </div>
                </div>
                <hr class="my-3">
            @endforeach
            </div>



        </div>
    </div>
</div>
