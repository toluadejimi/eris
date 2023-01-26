<div class="clearfix hidden-print ">
    <div class="easy-link-menu align-left ">
        <a class="{!! request()->is('product')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('product') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
        <a class="{!! request()->is('product/registration*')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('product.registration') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Register New Product</a>
        <a class="{!! request()->is('product/issueout')?'btn-success':'btn-danger' !!} btn-sm" href="{{ route('product.issueout') }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;Issue Out Product</a>
        <a class="{!! request()->is('product/issuein')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('product.issuein') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Add More Product</a>
        <a class="{!! request()->is('product/category*')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('product.category') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Category</a>
    </div>
    <hr class="hr-6 ">
</div>
