<div class=" p-1" style="background:rgb(242, 240, 255)">

    <a class="btn btn-primary text-center" href="{{route('admin.dashboard.index')}}">داشبورد</a>
    <!-- Users -->
    <hr>

    <a  href="#users" data-bs-toggle="collapse"
        class="asidelink nav-link dropdown-toggle p-1
            {{request()->is('admin/management/users*') ? 'bg-success' : ''}}
            {{request()->is('admin/management/roles*') ? 'bg-success' : ''}}
            {{request()->is('admin/management/permissions*') ? 'bg-success' : ''}}">
        <span class="ms-1 p-2 mt-2">مدیریت کاربران</span>
    </a>

    <div class="collapse rounded-bottom
    {{request()->is('admin/management/users*') ? 'show' : ''}}
    {{request()->is('admin/management/roles*') ? 'show' : ''}}
    {{request()->is('admin/management/permissions*') ? 'show' : ''}}"
        id="users" data-bs-parent="#menu"
        style="background: #e1e6bd">
        <a  class="btn btn-sm  {{request()->is('admin/management/users*') ? 'text-danger' : ''}}"
            href="{{route('admin.users.index')}}">کاربران</a><br>

        <a  class="btn btn-sm {{request()->is('admin/management/roles*') ? 'text-danger' : ''}}"
            href="{{route('admin.roles.index')}}">گروه های کاربری</a><br>

        <a  class="btn btn-sm {{request()->is('admin/management/permissions*') ? 'text-danger' : ''}}"
            href="{{route('admin.permissions.index')}}">مجوز ها</a>
    </div>


    <a  href="#categories" data-bs-toggle="collapse"
        class="asidelink nav-link dropdown-toggle p-1 mt-1
            {{request()->is('admin/management/attributes*') ? 'bg-success' : ''}}
            {{request()->is('admin/management/categories*') ? 'bg-success' : ''}}">
        <span class="ms-1 p-2 mt-2">دسته بندی و ویژگی ها</span>
    </a>
    <div class="collapse rounded-bottom
    {{request()->is('admin/management/attributes*') ? 'show' : ''}}
    {{request()->is('admin/management/categories*') ? 'show' : ''}}"
        id="categories" data-bs-parent="#menu"
        style="background: #e1e6bd">
        <a  class="btn btn-sm  {{request()->routeIs('admin.attributes.index') ? 'text-danger' : ''}}"
            href="{{route('admin.attributes.index')}}">ویژگی ها</a><br>

        <a  class="btn btn-sm  {{request()->routeIs('admin.categories.index') ? 'text-danger' : ''}}"
            href="{{route('admin.categories.index')}}">دسته بندی ها</a><br>

        <a  class="btn btn-sm {{request()->routeIs('admin.categories.create') ? 'text-danger' : ''}}"
            href="{{route('admin.categories.create')}}">افزودن  بندی</a>

    </div>

    <!-- Product -->

    <a  href="#products" data-bs-toggle="collapse"
        class="asidelink nav-link dropdown-toggle p-1 mt-1
            {{request()->is('admin/management/products*') ? 'bg-success' : ''}}
            {{request()->is('admin/management/tags*') ? 'bg-success' : ''}}
            {{request()->is('admin/management/brands*') ? 'bg-success' : ''}}"">
        <span class="ms-1 p-2 mt-2">محصولات</span>
    </a>
    <div class="collapse rounded-bottom
    {{request()->is('admin/management/products*') ? 'show' : ''}}
    {{request()->is('admin/management/tags*') ? 'show' : ''}}
    {{request()->is('admin/management/brands*') ? 'show' : ''}}"
        id="products" data-bs-parent="#menu"
        style="background: #e1e6bd">
        <a  class="btn btn-sm  {{request()->routeIs('admin.brands.index') ? 'text-danger' : ''}}"
            href="{{route('admin.brands.index')}}">برند ها</a><br>

        <a  class="btn btn-sm  {{request()->routeIs('admin.tags.index') ? 'text-danger' : ''}}"
            href="{{route('admin.tags.index')}}">تگ ها</a><br>

        <a  class="btn btn-sm {{request()->routeIs('admin.products.index') ? 'text-danger' : ''}}"
            href="{{route('admin.products.index')}}">مدیریت محصولات</a>

        <a  class="btn btn-sm {{request()->routeIs('admin.products.create') ? 'text-danger' : ''}}"
            href="{{route('admin.products.create')}}">افزودن محصول</a>
    </div>


        <!-- Banners -->

        <a  href="#banners" data-bs-toggle="collapse"
        class="asidelink nav-link dropdown-toggle p-1 mt-1
            {{request()->is('admin/management/banners*') ? 'bg-success' : ''}}">
        <span class="ms-1 p-2 mt-2">بنر ها</span>
    </a>
    <div class="collapse rounded-bottom
    {{request()->is('admin/management/banners*') ? 'show' : ''}}"
        id="banners" data-bs-parent="#menu"
        style="background: #e1e6bd">
        <a  class="btn btn-sm {{request()->routeIs('admin.banners.index') ? 'text-danger' : ''}}"
            href="{{route('admin.banners.index')}}">تمامی بنر ها</a><br>

        <a  class="btn btn-sm {{request()->routeIs('admin.banners.create') ? 'text-danger' : ''}}"
            href="{{route('admin.banners.create')}}">ساخت بنر جدید</a>
    </div>
    <a  href="/admin/management/comments"
        class="asidelink nav-link mt-1  p-1 {{request()->is('admin/management/comments*') ? 'bg-success' : ''}}">
        <span class="ms-1 p-2 mt-2">دیدگاه ها</span>
    </a>

    <a href="/admin/management/coupons" class="asidelink nav-link mt-1 p-1">
        <span class="ms-1 p-2 mt-2">کوپن ها</span>
    </a>
    <a href="/admin/management/orders" class="asidelink nav-link mt-1 p-1">
        <span class="ms-1 p-2 mt-2">سفارش ها</span>
    </a>
    <a href="/admin/management/transactions" class="asidelink nav-link mt-1 p-1">
        <span class="ms-1 p-2 mt-2">تراکنش ها</span>
    </a>

    <hr>



</div>
