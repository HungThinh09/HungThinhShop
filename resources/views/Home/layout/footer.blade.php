<div class="container-fluid">
    <div id="chat">
        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
    </div>
    <div id="backTop">
        <ion-icon name="arrow-up-circle-outline"></ion-icon>
    </div>
</div>
<div class="row">
    <div id="infomation" class="col-md-7 col-lg-7 col-12">
        <p><b> {!!getSetting('sologan')!!}</b></p>
     </div>
     @php
     @endphp
     <div id="contact" class="col-md-5 col-lg-5 col">
        <p>{!!getSetting('address')!!}</p>
        <p class="info"> <a href="{{getSetting('facebook')}}"><ion-icon name="logo-facebook"></ion-icon></a> 
        <a href="{{getSetting('instagram')}}"><ion-icon name="logo-instagram"></ion-icon></a> 
        <a href=""><ion-icon name="call-outline"></ion-icon>: <span>{{getSetting('phone')}}</span></a></p>
     </div>
</div>

<script src="{{ asset('adtp123/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adtp123/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adtp123/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('adtp123/js/home/backTop.js') }}"></script>
<script src="{{ asset('adtp123/js/home/bg.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@yield('js')