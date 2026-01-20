@extends('partials.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4 py-10">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="mb-6">
                    <h1 class="card-title text-2xl">
                        {{ __('Confirm password') }}
                    </h1>
                    <p class="text-sm opacity-70">
                        {{ __('Please confirm your password before continuing.') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    {{-- Password --}}
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">
                            {{ __('Password') }}
                        </legend>
                        <input
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="input w-full @error('password') input-error @enderror"
                        />
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
