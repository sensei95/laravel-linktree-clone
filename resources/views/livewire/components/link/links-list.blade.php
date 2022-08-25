<section>
    <livewire:components.link.add-link-form />
    <h1 class="pb-2 mt-8 text-3xl font-bold border-b border-slate-400">My links</h1>
    @if ($links->count())
        <ul class="grid items-start py-12 lg:grid-cols-2 gap-x-4">
            @if($links->count() > 0)
                @foreach($links as $link)
                    <livewire:components.link.link-card :link="$link" :key="$link->id" />
                @endforeach
            @endif
        </ul>
    @else
        <div class="flex flex-col items-center p-6 mt-8 text-lg font-medium text-center bg-white gap-y-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                </svg>
            </div>
            You have not registered any link yet
        </div>
    @endif
</section>
