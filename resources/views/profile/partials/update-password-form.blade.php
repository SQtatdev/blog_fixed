<section class="card bg-base-100 shadow-md">
    <div class="card-body space-y-6">
        <header>
            <h2 class="card-title">
                {{ __('Update password') }}
            </h2>
            <p class="text-sm opacity-70">
                {{ __('Use a long, random password to stay secure.') }}
            </p>

            @if (session('status') === 'password-updated')
                <div role="alert" class="alert alert-success mt-4 text-sm">
                    <span>{{ __('Your password has been updated.') }}</span>
                </div>
            @endif
        </header>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Current Password --}}
            <fieldset class="fieldset">
                <legend class="fieldset-legend">
                    {{ __('Current password') }}
                </legend>
                <input
                    type="password"
                    name="current_password"
                    autocomplete="current-password"
                    class="input w-full
                        @if($errors->updatePassword?->has('current_password')) input-error @endif"
                />
                @if ($errors->updatePassword?->has('current_password'))
                    <p class="label text-error">
                        {{ $errors->updatePassword->first('current_password') }}
                    </p>
                @endif
            </fieldset>

            <div class="grid gap-5 md:grid-cols-2">
                {{-- New Password --}}
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">
                        {{ __('New password') }}
                    </legend>
                    <input
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        class="input w-full
                            @if($errors->updatePassword?->has('password')) input-error @endif"
                    />
                    @if ($errors->updatePassword?->has('password'))
                        <p class="label text-error">
                            {{ $errors->updatePassword->first('password') }}
                        </p>
                    @endif
                </fieldset>

                {{-- Confirm Password --}}
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">
                        {{ __('Confirm password') }}
                    </legend>
                    <input
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        class="input w-full
                            @if($errors->updatePassword?->has('password_confirmation')) input-error @endif"
                    />
                    @if ($errors->updatePassword?->has('password_confirmation'))
                        <p class="label text-error">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </p>
                    @endif
                </fieldset>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <span class="text-success text-sm">
                        {{ __('Saved.') }}
                    </span>
                @endif
            </div>
        </form>
    </div>
</section>
