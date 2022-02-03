<x-app-layout>

    <div class="title">
        <h1>{{ __('messages.profil_show_title') }}</h1>
    </div>

    <div class="user">

        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="user--information">
                @livewire('profile.update-profile-information-form')
            </div>
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="user--password-update">
                @livewire('profile.update-password-form')
            </div>
        @endif

        <div class="user--logout">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="user--delete">
                @livewire('profile.delete-user-form')
            </div>
        @endif

    </div>

</x-app-layout>
