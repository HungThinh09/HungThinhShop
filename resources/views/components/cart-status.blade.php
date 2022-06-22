<div class="" id="status">
    @if ($style == 1)
        @switch($status)
            @case(0)
                <div class="btn btn-secondary "> đang xử lý </div>
            @break

            @case(1)
                <div class="btn btn-secondary"> Đang lấy hàng</div>
            @break

            @case(2)
                <div class="btn btn-info"> Đang gửi hàng</div>
            @break

            @case(3)
                <div class="btn btn-success">Giao hàng thành công</div>
            @break

            @default
            <div class="btn btn-danger "> Hủy đơn</div>
        @endswitch
    @else
        <div class="btn btn-{{ $status == -1 ? 'danger btn-lg' : 'default ' }} status"> Hủy đơn</div>

        <div class="btn btn-{{ $status == 0 ? 'secondary btn-lg' : 'default ' }} status"> đang xử lý </div>

        <div class="btn btn-{{ $status == 1 ? 'secondary btn-lg' : 'default ' }} status"> Đang lấy hàng</div>

        <div class="btn btn-{{ $status == 2 ? 'info btn-lg' : 'default ' }} status"> Đang gửi hàng</div>

        <div class="btn btn-{{ $status == 3 ? 'success btn-lg' : 'default ' }} status">Giao hàng thành công</div>
    @endif


</div>
