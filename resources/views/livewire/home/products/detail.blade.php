<div>
    <!-- Attributes -->
    <div class="row mx-5">
        <div class="col-md-3">
            <h4>ویژگی ها</h4>
            <span class="text-muted" style="font-size:12px">{{$product->name}}</span>
        </div>
        <div class="col-md-6">
            <table style="border-spacing: 18px; border-collapse: separate;">
                <thead>
                    <tr>
                        <th scope="col">مشخصات</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->product_attributes as $product_attributes )
                        <tr>
                            <td class="text-muted">{{$product_attributes->attribute->name}}</td>
                            <td class="text-end">{{$product_attributes->value}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="text-muted">توضیحات</td>
                            <td class="text-end ">{{$product->description}}</td>
                        </tr>
                </tbody>
            </table>

        </div>
        <div class="col-md-12">
            <hr>

        </div>
    </div>
    <!-- END Attributes -->



</div>
