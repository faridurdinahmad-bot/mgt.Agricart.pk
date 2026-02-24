@php
    $cardClass = 'group block p-5 rounded-2xl backdrop-blur-xl bg-white/10 dark:bg-white/5 border border-white/20 dark:border-white/10 hover:border-primary-500/60 hover:bg-white/15 dark:hover:bg-white/10 transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_30px_rgba(131,183,53,0.2)] text-left';
    $iconClass = 'flex items-center justify-center w-16 h-16 rounded-2xl bg-white/10 dark:bg-white/5 border border-white/20 dark:border-white/10 group-hover:bg-primary-500/20 group-hover:border-primary-500/50 transition-all duration-300 text-gray-700 dark:text-white group-hover:text-primary-500 shadow-lg';
@endphp

<div class="space-y-8">
    <div>
        <h2 class="text-xs font-semibold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-4">Daily Operations</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($dailyOperations as $card)
                <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                    <span class="{{ $iconClass }}">@svg('heroicon-o-'.$card['icon'], 'w-8 h-8')</span>
                    <h3 class="mt-3 text-base font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-primary-500 transition-colors">{{ $card['title'] }}</h3>
                    <p class="mt-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 leading-snug">{{ $card['description'] }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="text-xs font-semibold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-4">Administrative</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($administrative as $card)
                <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                    <span class="{{ $iconClass }}">@svg('heroicon-o-'.$card['icon'], 'w-8 h-8')</span>
                    <h3 class="mt-3 text-base font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-primary-500 transition-colors">{{ $card['title'] }}</h3>
                    <p class="mt-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 leading-snug">{{ $card['description'] }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="text-xs font-semibold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-4">Analysis</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($analysis as $card)
                <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                    <span class="{{ $iconClass }}">@svg('heroicon-o-'.$card['icon'], 'w-8 h-8')</span>
                    <h3 class="mt-3 text-base font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-primary-500 transition-colors">{{ $card['title'] }}</h3>
                    <p class="mt-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 leading-snug">{{ $card['description'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
