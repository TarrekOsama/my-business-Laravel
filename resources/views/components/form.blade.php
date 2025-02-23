<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <h3 class="text-center mb-4">{{ $submitButtonName ?? 'Submit' }}</h3>
        @error('login-error')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <form action="{{ $action ?? request()->url() }}" method="{{ $method ?? 'POST' }}" class="needs-validation"
              novalidate>
            @csrf

            {{--            will discuss later--}}
            {{--            @if(isset($method) && strtoupper($method) !== 'GET')--}}
            {{--                @method($method)--}}
            {{--            @endif--}}

            @foreach ($fields as $field)
                <div class="mb-3">
                    <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
                    <input type="{{ $field['type'] ?? 'text' }}"
                           name="{{ $field['name'] }}"
                           id="{{ $field['name'] }}"
                           class="form-control @error($field['name']) is-invalid @enderror"
                           value="{{ old($field['name']) }}"
                           required>

                    @error($field['name'])
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary w-100">{{ $submitButtonName ?? 'Send' }}</button>
        </form>
        <p class="text-center mt-3">
            {{ $redirectLinkMessage?? 'Already have an account?' }} <a href="{{ $gotToLoginOrRegisterLink ?? route('auth.login.form') }}">{{ $linkName ?? 'Login' }}</a>
        </p>
    </div>
</div>