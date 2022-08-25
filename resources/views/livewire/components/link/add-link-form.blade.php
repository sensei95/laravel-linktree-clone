<div>
    @if (!$showForm)
        <x-button wire:click.prevent="toggleShowForm" class="bg-sky-600 hover:bg-sky-800">
            Add new link
        </x-button>
    @endif
    @if ($showForm)
        <div class="grid p-4 mt-8 bg-white gap-y-4">
            <h2 class="text-2xl text-bold">Add new link</h2>

            <form method="post" wire:submit.prevent='save'>
                @csrf

                <div class="">
                    <label for="thumbnail" class="items-center justify-center inline-block w-16 h-16 rounded-full cursor-pointer bg-slate-200">
                        @if (!$thumbnail)
                            <div class="flex items-center justify-center w-full h-full icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @else
                            <img src="{{ $thumbnail->temporaryUrl() }}" alt="" class="object-cover object-center w-full h-full rounded-full">
                        @endif
                    </label>
                    <input type="file" id="thumbnail" class="hidden" wire:model='thumbnail'>
                    @error('thumnail')
                        <span class="inline-block px-4 py-2 my-2 text-red-500 bg-red-100">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="name">Link's name</label>
                    <div class="">
                        <input type="text" wire:model.lazy='name'>
                    </div>
                    @error('name')
                        <span class="inline-block px-4 py-2 my-2 text-red-500 bg-red-100">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="name">Link's url</label>
                    <div class="">
                        <input type="text" wire:model.lazy='link'>
                    </div>
                    @error('link')
                        <span class="inline-block px-4 py-2 my-2 text-red-500 bg-red-100">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="">
                    <div class="">
                        <label for="active"><input type="checkbox" id="active" wire:model.lazy='active'> activate ?</label>
                    </div>
                </div>

                <x-button type="submit">
                    Create link
                </x-button>
                <x-button wire:click.prevent="toggleShowForm">
                    Cancel
                </x-button>
            </form>
        </div>
    @endif
</div>
