<x-jet-form-section submit="updateProfileInformation">

        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />
                    <x-jet-label for="photo" value="{{ __('Photo') }}" />
                    <!-- Current Profile Photo -->
                    <div x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                    </div>
                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview">
                        <span
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                    <x-jet-secondary-button type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>
                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif
                    <x-jet-input-error for="photo"/>
                </div>
            @endif
            <!-- Name -->
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name"/>
            </div>
            <!-- Email -->
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" wire:model.defer="state.email" />
                <x-jet-input-error for="email"/>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

</x-jet-form-section>
