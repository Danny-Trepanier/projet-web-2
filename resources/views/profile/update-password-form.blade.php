<x-jet-form-section submit="updatePassword">

    <x-slot name="title">
        {{ __('messages.profil_show_update_password_title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('messages.profil_show_update_password_description') }}
    </x-slot>

    <x-slot name="form">
        <div>
            <x-jet-label for="current_password" value="{{ __('messages.profil_show_update_password_label_current_password') }}" />
            <x-jet-input id="current_password" type="password" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password"/>
        </div>

        <div>
            <x-jet-label for="password" value="{{ __('messages.profil_show_update_password_label_new_password') }}" />
            <x-jet-input id="password" type="password" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password"/>
        </div>

        <div>
            <x-jet-label for="password_confirmation" value="{{ __('messages.profil_show_update_password_label_confirm_password') }}" />
            <x-jet-input id="password_confirmation" type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message on="saved">
            {{ __('messages.profil_show_profile_message_success') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('messages.profil_show_profile_save_button') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
