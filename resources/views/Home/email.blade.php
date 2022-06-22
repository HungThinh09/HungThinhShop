<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin đơn hàng</title>
    <style>
        #content {
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div id="content">
        <p>Thân gửi quý khách hàng: {{ $data->name }}</p>
        <small>Mã đơn hàng: <i>{{ $data->codeId }}</i></small>
        <div>
            <p>Cám ơn quý khánh hàng đã tin tưởng và sử dụng dịch vụ của chúng tôi.</p>
            <p>CHúng tôi gửi đến quý khách hàng chi tiết đơn hàng của mình đã đặt và Đơn hàng sẽ được chuyển đến khoảng từ 3 -> 5 ngày tới.
            </p>
            <p>Theo dõi đơn hàng tại (sử dụng MĐH) <a href="{{route('cart')}}">link</a></p>
            <p>Quý khách check lại thông tin nếu có sai sót xin phản hồi tới đường dây nóng 09899999 hoặc
                click. <a href="{{route('home')}}">Tại đây</a>
            </p>
        </div>
        <div>
            <table class="table " border="2px">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th width="20%">Hình ảnh</th>
                        <th>Đơn giá(VND - Sale)</th>
                        <th width="15%">Số lượng </th>
                        <th width="15%">Thành tiền(VND)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $quantity = $price = 0;
                    @endphp
                    @foreach ($data->carts as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->product->productName }}</td>
                            <td><img width="100%" height="" src="{{ asset('uploads/product/' . $item['image']) }}"
                                    alt=""></td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td>{{ number_format($item->price * $item->quantity) }} </td>
                        </tr>
                        @php
                            $quantity += $item->quantity;
                            $price += $item->price * $item->quantity;
                        @endphp
                    @endforeach
    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Tổng sản phẩm</th>
                        <th>{{ $quantity }}</th>
                    </tr>
                    <tr>
                        <th colspan="5">Thành tiền</th>
                        <th>{{ number_format($price) }}</th>
    
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
 
   

