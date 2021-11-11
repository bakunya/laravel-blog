@extends("layouts.main")

@section("title", "Register")

@section("content")
    <div class="container d-flex align-items-center justify-content-center mh-100">
        <form method="post" action="/register" class="border px-4 p-5 rounded">
            @csrf
            <p class="lead mb-4">Register</p>
            <div class="input-group {{ !$errors->has('username') ? 'mb-3' : null }}" id="username-group">
                <span class="input-group-text @error('username') border-danger @enderror" id="basic-addon1">
                    <x-icons.user />
                </span>
                <input type="text" class="form-control @error('username') text-danger shadow-none border-danger @enderror" placeholder="Username" aria-label="username" aria-describedby="basic-addon1" name="username" value="{{ old('username') }}">
            </div>
            @error("username")
                <small class="mb-3 mt-2 ms-1 d-block text-danger">{{ $errors->first('username') }}</small>
            @enderror

            <div class="input-group {{ !$errors->has('email') ? 'mb-3' : null }}" id="email-group">
                <span class="input-group-text @error('email') border-danger @enderror" id="basic-addon1">
                    <x-icons.email />
                </span>
                <input type="email" class="form-control @error('email') text-danger shadow-none border-danger @enderror" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
            </div>
            @error("email")
                <small class="mb-3 mt-2 ms-1 d-block text-danger">{{ $errors->first('email') }}</small>
            @enderror

            <div class="input-group {{ !$errors->has('password') ? 'mb-3' : null }}" id="password-group">
                <span class="input-group-text @error('password') border-danger @enderror" id="basic-addon1">
                    <x-icons.lock />
                </span>
                <input type="password" class="form-control @error('password') text-danger shadow-none border-danger @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                <span class="input-group-text cursor-pointer icon-button @error('password') border-danger @enderror" id="basic-addon1">
                    <x-icons.eye-slash />
                </span>
            </div>
            @error("password")
                <small class="mb-3 mt-2 ms-1 d-block text-danger">{{ $errors->first('password') }}</small>                
            @enderror

            <button type="submit" class="btn btn-primary ms-auto d-block">Register</button>
        </form>
    </div>
@endsection

@section("script")
    <script src="/show-password.js"></script>
@endsection