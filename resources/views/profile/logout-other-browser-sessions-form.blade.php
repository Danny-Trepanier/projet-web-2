<x-jet-action-section>
    <x-slot name="title">
        {{ __('messages.profil_show_browser_sessions_title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('messages.profil_show_browser_sessions_description') }}
    </x-slot>

    <x-slot name="content">
        <div>
            {{ __('messages.profil_show_browser_sessions_content') }}
        </div>

        @if (count($this->sessions) > 0)
            <div>
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                </svg>
                            @endif
                        </div>

                        <div>
                            <div>
                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span>{{ __('messages.profil_show_browser_sessions_this_device_text') }}</span>
                                    @else
                                        {{ __('messages.profil_show_browser_sessions_last_active_text') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div>
            <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('messages.profil_show_browser_sessions_logout_button') }}
            </x-jet-button>

            <x-jet-action-message on="loggedOut">
                {{ __('messages.profil_show_browser_sessions_message_done') }}
            </x-jet-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('messages.profil_show_browser_sessions_modal_title') }}
            </x-slot>

            <x-slot name="content">
                {{ __('messages.profil_show_browser_sessions_modal_content') }}

                <div x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password"
                                placeholder="{{ __('messages.profil_show_browser_sessions_modal_label_password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-jet-input-error for="password"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('messages.profil_show_cancel_button') }}
                </x-jet-secondary-button>

                <x-jet-button
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __('messages.profil_show_browser_sessions_modal_logout_button') }}
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>

    </x-slot>

</x-jet-action-section>
