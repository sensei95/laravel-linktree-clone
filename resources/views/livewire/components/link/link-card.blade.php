<li class="mb-4 bg-white border">
    <article class="grid p-4 gap-y-3">
        <header class="flex items-start justify-between">
            <input type="checkbox" {{ $link->active ? 'checked':'' }} wire:model='link.active' wire:change='save'>
            <livewire:components.link.thumbnail :link="$link" :key="$link->id.$link->name" />
        </header>
        <div class="flex items-center gap-x-2">
            <h4 class="{{ $editing['name'] ? 'hidden' : '' }} text-base text-slate-800 font-semibold">
                {{ $link->name }}
            </h4>
            <button class="{{ $editing['name'] ? 'hidden' : '' }}" wire:click.prevent="toggleEditing('name')">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>
            <input class="{{ !$editing['name'] ? 'hidden' : '' }} w-full p-0 border-none outline-none ring-0 focus:ring-0" type="text" wire:model="link.name" wire:keydown.enter="save">
        </div>
        <div class="flex items-center gap-x-2">
            <a href="{{ $link->link }}" target="_blank" class="{{ $editing['link'] ? 'hidden' : '' }} inline-block text-sm">
                {{ $link->link }}
            </a>
            <button class="{{ $editing['link'] ? 'hidden' : '' }}" wire:click.prevent="toggleEditing('link')">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>
            <input class="{{ !$editing['link'] ? 'hidden' : '' }} w-full py-0 px-2 border-none outline-none ring-0 focus:ring-0 text-sm" type="text" wire:model="link.link" wire:keydown.enter="save">
        </div>
        <footer class="flex items-center justify-between pt-3 pb-0 mt-2 mb-0 border-t">
            <div class="flex items-center gap-x-3">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </button>
                <button class="flex items-center text-sm font-medium gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    {{ $link->visits->count() }} {{ \Illuminate\Support\Str::plural('Click',$link->visits->count()) }}
                </button>
            </div>
            <div class="flex items-center gap-x-3">
                <button wire:click.prevent='delete'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </footer>
    </article>
</li>
