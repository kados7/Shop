<div>
    <!-- Filter Bar -->
    <div class="d-flex flex-row my-4 mx-5">
        <!-- Filter_Attributes -->

        @foreach ($filter_attributes as $filter_attribute )
            <div class="btn-group" wire:key="div-{{ $loop->index }}">
                <button type="button" class="btn btn-filter dropdown-toggle py-2 px-3" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                {{$filter_attribute->name}}
                </button>
                <ul class="dropdown-menu dropdown-container p-2">
                    <div class="filter_search container">
                        <input class="filter_search input border-0" type="text" placeholder="جستوجو در محصولات زیر ...">
                    </div>
                    @foreach ($filter_attribute->filter_attribute_values as $filter_attribute_value)
                        <div>
                            <input wire:model.defer="filter_value" wire:key="{{$filter_attribute_value->value}}" type="checkbox"
                                    value="{{$filter_attribute_value->value}}">
                            <button class="btn">{{$filter_attribute_value->value}}</button>
                        </div>
                    @endforeach

                    <li><hr class="dropdown-divider"></li>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-dark rounded-0  py-2 px-3 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                        </button>
                    <button wire:click="set_product_attribute_filters({{$filter_attribute->id}})" class="btn btn-dark py-2 px-3 rounded-0">اعمال</button>
                    </div>
                </ul>
            </div>
        @endforeach

        <!-- Variable _Attributes -->

        @foreach ($variation_attributes as $variation_attribute )
            <div class="btn-group">
                <button type="button" class="btn btn-filter dropdown-toggle py-2 px-3" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                {{$variation_attribute->name}}
                </button>
                <ul class="dropdown-menu dropdown-container p-2">
                    <div class="filter_search container">
                        <input class="filter_search input border-0" type="text" placeholder="جستوجو در محصولات زیر ...">
                    </div>
                    @foreach ($variation_attribute->variation_attribute_values as $variation_attribute_value )
                        <div>
                            <input wire:model.defer="variation_value" type="checkbox" value="{{$variation_attribute_value->value}}">
                            <button class="btn">{{$variation_attribute_value->value}}</button>
                        </div>
                    @endforeach


                    <li><hr class="dropdown-divider"></li>
                    <div class="d-flex justify-content-end">
                        <button wire:click="$emit('refresh_filters')" class="btn btn-outline-dark rounded-0  py-2 px-3 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                        </button>
                    <button wire:click="set_product_variation_filters({{$variation_attribute->id}})" class="btn btn-dark py-2 px-3 rounded-0">اعمال</button>
                    </div>
                </ul>
            </div>
        @endforeach


        <div class="btn-group me-auto">
            <button type="button" class="btn btn-filter dropdown-toggle py-2 px-3" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                <span style="color:black">ترتیب</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                    <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                </svg>
            </button>
            <ul class="dropdown-menu text-end p-1 border-dark rounded-0">
                <li>
                    <button wire:click="sorted_by('latest')" class="btn dropdown-item">
                        <span style="color:black">جدیدترین</span>
                    </button>
                </li>

                <li>
                    <button wire:click="sorted_by('oldest')" class="btn dropdown-item" style="color:black">قدیمی ترین</button>
                </li>

                <li>
                    <button wire:click="sorted_by('max_price')" class="btn dropdown-item">
                        <span style="color:black">بیشترین قیمت</span>
                    </button>
                </li>

                <li>
                    <button wire:click="sorted_by('min_price')" class="btn dropdown-item" style="color:black">کمترین قیمت</button>
                </li>

            </ul>
        </div>



    </div>

</div>
