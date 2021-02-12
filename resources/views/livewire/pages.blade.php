<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>
        {{-- Modal Form --}}
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save Page') }}
            </x-slot>

            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"/>
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-gray-400 bg-gray-50 text-gray-500 text-sm">
                            http://localhost:8000/
                        </span>
                        <input wire:model="slug" class="form-input flex-1 block w-full border border-r-0 border-gray-400 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>
