{{-- BEING: Component Loing --}}
<div class="login-conent-wrapper">
    <div class="login-body-wrapper">
        <div class="loing-text">Sign in</div>

        {{-- form --}}
        <div class="form-login">
            <form action="{{ $route }}" method="POST">
                @csrf
                {{-- username --}}
                <div class="form-group">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" class="form-control border-wrapper" required>
                </div>
                {{-- password --}}
                <div class="form-group mt-3">
                    <label for="password">Password</label><br>
                    <div class="password-ipunt-wrapper border-wrapper">
                        <input type="password" name="password" id="password" class="form-control border-0" required>
                        <span id="show-password">show</span>
                    </div>
                </div>
                {{-- btn submit --}}
                <div class="form-group mt-4">
                    <input type="submit" name="submit" class="btn btn-purple text-center w-100" value="sing in">
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END: Component Loing --}}