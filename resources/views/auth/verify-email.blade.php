@extends('partials.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="mb-4 text-sm opacity-70">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                {{-- Verification Status --}}
                @if (session('status') === 'verification-link-sent')
                    <div role="alert" class="alert alert-success mb-4 text-sm">
                        <span>
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </span>
                    </div>
                @endif

                <div class="flex items-center justify-between gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-ghost text-sm"
                        >
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
