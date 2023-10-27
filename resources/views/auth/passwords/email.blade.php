@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">Reset Password</h1>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="email">E-Mail Address</label>

            <div class="control">
                <input id="email" type="email"
                    class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">{{ __('Send Password Reset Link') }}</button>
            </div>
        </div>
    </form>
@endsection
