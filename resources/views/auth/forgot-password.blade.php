<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4 py-10">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-6">
                <div>
                    <h1 class="card-title">{{ __('Forgot password') }}</h1>
                    <p class="text-sm opacity-70">
                        {{ __('Tell us your email and we will send you a reset link.') }}
                    </p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <div class="form-control">
                        <label for="email" class="label">
                            <span class="label-text font-semibold">
                                {{ __('Email address') }}
                            </span>
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="input input-bordered w-full"
                        >
                        @error('email')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full">
                        {{ __('Send reset link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
