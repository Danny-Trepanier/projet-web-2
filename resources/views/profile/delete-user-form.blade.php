<x-jet-action-section>

    <div class="user--delete">
        <x-slot name="title">
            {{ __('messages.profil_show_delete_account_title') }}
        </x-slot>
        <x-slot name="description">
            {{ __('messages.profil_show_delete_account_description') }}
        </x-slot>
        <x-slot name="content">
            <div>
                {{ __('messages.profil_show_delete_account_content') }}
            </div>
            <div>
                <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                    {{ __('messages.profil_show_delete_account_delete_button') }}
                </x-jet-danger-button>
            </div>
            <!-- Delete User Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingUserDeletion">
                <x-slot name="title">
                    {{ __('messages.profil_show_delete_account_modal_title') }}
                </x-slot>
                <x-slot name="content">
                    {{ __('messages.profil_show_delete_account_modal_content') }}
                    <div x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="password"
                                    placeholder="{{ __('messages.profil_show_delete_account_modal_label_password') }}"
                                    x-ref="password"
                                    wire:model.defer="password"
                                    wire:keydown.enter="deleteUser" />
                        <x-jet-input-error for="password"/>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                        {{ __('messages.profil_show_cancel_button') }}
                    </x-jet-secondary-button>
                    <x-jet-danger-button wire:click="deleteUser" wire:loading.attr="disabled" class="user--delete-button">
                        {{ __('messages.profil_show_delete_account_delete_button') }}
                    </x-jet-danger-button>
                </x-slot>

            </x-jet-dialog-modal>

        </x-slot>

    </div>

</x-jet-action-section>
