@extends('partials.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4 py-10">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="mb-6">
                    <h1 class="card-title text-2xl">
                        {{ __('Forgot password') }}
                    </h1>
                    <p class="text-sm opacity-70">
                        {{ __('Tell us your email and we will send you a reset link.') }}
                    </p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div role="alert" class="alert alert-success mb-4">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">
                            {{ __('Email address') }}
                        </legend>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="input w-full @error('email') input-error @enderror"
                        />
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Send reset link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
