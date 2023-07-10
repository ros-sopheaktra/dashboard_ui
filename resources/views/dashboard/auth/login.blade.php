<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/library/cdn.bootstrap@5.3.0.min.css') }}">
    {{-- font family --}}
    <link href="{{ asset('css/font-family/stylesheet.css') }}" rel="stylesheet">
    {{-- style sheet --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard/hashboard_login.css') }}">
</head>
<body>
    {{-- BEING: Dashboard Loing --}}
    <div class="login-container">
        {{-- component loging --}}
        <x-vs-dashboard-login route="{{ route($route) }}"></x-vs-dashboard-login>
    </div>
    {{-- END: Dashboard Loing --}}
</body>

{{-- jquery script --}}
<script src="{{asset('js/library/jquery-3.7.0.min.js')}}"></script>
<script>
    // custom script
    $(document).ready(function() {
        // hide show password
        $("#show-password").on("click", function(){
            let passwordType = document.getElementById("password");
            let textShow     = document.getElementById("show-password");
            if (passwordType.type === "password") {
                passwordType.type = "text";
                textShow.textContent = "hide";
            } else {
                passwordType.type = "password";
                textShow.textContent = "show";
            }
        });
    });
</script>
</html>