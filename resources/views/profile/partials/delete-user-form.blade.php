<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-base-content/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-error" onclick="my_modal_1.showModal()">{{ __('Delete Account') }}</button>
    <dialog id="my_modal_1" class="modal" @if($errors->userDeletion->get('password')) open @endif>
        <div class="modal-box">
            <form id="delete-form" method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-base-content">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-base-content/70">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <fieldset class="fieldset mt-6">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input name="password" type="password" required
                        class="input w-full @error('password') input-error @enderror" autocomplete="current-password" />
                    @if($errors->userDeletion->get('password'))
                        @foreach($errors->userDeletion->get('password') as $error)
                            <p class="label text-error">{{ $error }}</p>
                        @endforeach
                    @endif
                </fieldset>
            </form>

            <div class="modal-action">
                <div class="mt-6 flex justify-end">
                    <form method="dialog">
                        <button class="btn">
                            {{ __('Cancel') }}
                        </button>
                    </form>
                    <button type="submit" form="delete-form" class="btn btn-error ms-3">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </div>
        </div>
    </dialog>
</section>
