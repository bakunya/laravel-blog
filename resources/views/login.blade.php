@extends("layouts.main")

@section("title", "Login")

@section("content")
    <x-flash.flash-alert />
    <div class="container d-flex align-items-center justify-content-center mh-100">
        <form method="post" action="/login" class="border px-4 p-5 rounded">
            {{ csrf_field() }}
            <p class="lead mb-4">Login</p>
            
            @error("email")
                <div class="input-group" id="email-group">
                    <span class="input-group-text border-danger" id="basic-addon1">
                        <x-icons.email />
                    </span>
                    <input type="text" class="form-control text-danger shadow-none border-danger" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
                </div>
                <small class="mb-3 mt-2 ms-1 d-block text-danger">{{ $errors->first('email') }}</small>
            @else
                <div class="input-group mb-3" id="email-group">
                    <span class="input-group-text" id="basic-addon1">
                        <x-icons.email />
                    </span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
                </div>
            @enderror

            
            @error('password')
                <div class="input-group" id="password-group">
                    <span class="input-group-text border-danger" id="basic-addon1">
                        <x-icons.lock />
                    </span>
                    <input type="password" class="form-control text-danger shadow-none border-danger" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                    <span class="input-group-text cursor-pointer icon-button border-danger" id="basic-addon1">
                        <x-icons.eye-slash />
                    </span>
                </div>
                <small class="mb-3 mt-2 ms-1 d-block text-danger">{{ $errors->first('password') }}</small>
            @else
                <div class="input-group mb-3" id="password-group">
                    <span class="input-group-text" id="basic-addon1">
                        <x-icons.lock />
                    </span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                    <span class="input-group-text cursor-pointer icon-button" id="basic-addon1">
                        <x-icons.eye-slash />
                    </span>
                </div>
            @enderror

            <button type="submit" class="btn btn-primary ms-auto d-block">Login</button>
        </form>
    </div>
@endsection

@section("script")
    <script src="show-password.js"></script>
@endsection