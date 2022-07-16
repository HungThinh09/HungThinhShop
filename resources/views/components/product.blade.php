<div>
    <ul class="products">
        @if ($products->count()>0)
            @foreach ($products as $product)
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="{{ route('detail', ['slug' => $product->productSlug]) }}" class="product-thumb">
                                <img src="{{ asset('uploads/product/'.$product->image) }}" alt="product one">
                            </a>
                            <a href="{{ route('detail', ['slug' => $product->productSlug]) }}" class="buy-now">Mua ngay</a>
                            @if ($product->sale && $product->sale >0 && $product->sale <= 100)
                                <span class="sale">{{ $product->sale }}%</span>
                            @endif

                        </div>
                        <div class="product-info">
                            <div class="product-cat">
                                @foreach ($product->category as $cate)
                                     <span> {{$cate->categoryName}} / </span>
                                @endforeach

                            </div>
                            <a href="{{ route('detail', ['slug' => $product->productSlug]) }}"
                                class="product-name">{{ $product->productName }} </a>
                            <div class="product-price ">
                                @if ($product->sale && $product->sale >0 && $product->sale <= 100)
                                    <span class="gach">{{  number_format($product->price) }}</span>
                                    <span class="red">->
                                        {{ number_format($product->price - ($product->price / 100) * $product->sale) }}
                                        VNĐ</span>
                                @else
                                    <span class="">{{ number_format($product->price) }} VNĐ</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <div class="">
                <p>Không tìm thấy sản phẩm phù hợp . Vui lòng quay lại sau.....</p>
            </div>
        @endif

    </ul>
</div>
