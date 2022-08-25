<label for="thumbnail-{{$link->id}}" class="w-10 h-10 rounded-full cursor-pointer bg-slate-200 ring-2">
    @if ($link->thumbnail)
        <img src="{{ $link->thumbnail }}" class="object-cover object-center w-full h-full rounded-full" />
    @endif
    <input type="file" id="thumbnail-{{$link->id}}" class="hidden" wire:model='thumbnail'>
</label>
