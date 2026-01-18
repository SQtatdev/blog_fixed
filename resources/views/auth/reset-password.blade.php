<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-base-200 px-4 py-10">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-6">
                <div>
                    <h1 class="card-title">{{ __('Reset password') }}</h1>
                    <p class="text-sm opacity-70">
                        {{ __('Choose a new password to regain access to your account.') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="input input-bordered w-full"
                        >
                        @error('email')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label for="password" class="label">
                            <span class="label-text font-semibold">
                                {{ __('New password') }}
                            </span>
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                            class="input input-bordered w-full"
                        >
                        @error('password')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label for="password_confirmation" class="label">
                            <span class="label-text font-semibold">
                                {{ __('Confirm password') }}
                            </span>
                        </label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            class="input input-bordered w-full"
                        >
                        @error('password_confirmation')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full">
                        {{ __('Reset password') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
