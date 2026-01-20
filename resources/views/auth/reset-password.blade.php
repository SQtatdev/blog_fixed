@extends('partials.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4 py-10">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="mb-6">
                    <h1 class="card-title text-2xl">
                        {{ __('Reset password') }}
                    </h1>
                    <p class="text-sm opacity-70">
                        {{ __('Choose a new password to regain access to your account.') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">
                            {{ __('Email address') }}
                        </legend>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="input w-full @error('email') input-error @enderror"
                        />
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    {{-- New Password --}}
                    <fieldset class="fieldset mt-2">
                        <legend class="fieldset-legend">
                            {{ __('New password') }}
                        </legend>
                        <input
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="input w-full @error('password') input-error @enderror"
                        />
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    {{-- Confirm Password --}}
                    <fieldset class="fieldset mt-2">
                        <legend class="fieldset-legend">
                            {{ __('Confirm password') }}
                        </legend>
                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="input w-full @error('password_confirmation') input-error @enderror"
                        />
                        @error('password_confirmation')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Reset password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
