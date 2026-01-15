@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">

        <div class="card-body">
            <h2 class="card-title">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Name')</legend>
                    <input value="{{ old('name') }}" name="name" type="text" required
                        class="input w-full @error('name') input-error @enderror" autofocus autocomplete="name" />
                    @error('name')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Email Address -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input value="{{ old('email') }}" name="email" type="email" required
                        class="input w-full @error('email') input-error @enderror" autocomplete="username" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>


                <!-- Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input name="password" type="password" required
                        class="input w-full @error('password') input-error @enderror" autocomplete="new-password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>


                <!-- Confirm Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                    <input name="password_confirmation" type="password" required
                        class="input w-full @error('password_confirmation') input-error @enderror" autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-end mt-4">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="btn btn-primary ms-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
