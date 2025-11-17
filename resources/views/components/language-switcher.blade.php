{{-- Language Switcher Component - Clean Text-Based Design --}}
<div class="relative" x-data="{ open: false, lang: localStorage.getItem('lang') || 'en' }" x-init="lang = localStorage.getItem('lang') || 'en'">
    <button @click="open = !open"
        class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        :title="lang === 'en' ? 'Switch to Khmer' : 'Switch to English'" aria-label="Change language">
        <span class="font-semibold uppercase tracking-wide" x-text="lang === 'en' ? 'EN' : 'KM'"></span>
        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
        class="absolute right-0 mt-2 w-36 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1.5 z-50 overflow-hidden backdrop-blur-sm">

        <button @click="if (window.switchLanguage) { window.switchLanguage('en'); lang = 'en'; } open = false"
            :class="lang === 'en' ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400' :
                'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
            class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium transition-colors duration-150">
            <div class="flex items-center gap-2">
                <span class="font-semibold uppercase tracking-wide text-xs">EN</span>
                <span>English</span>
            </div>
            <svg x-show="lang === 'en'" class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <button @click="if (window.switchLanguage) { window.switchLanguage('km'); lang = 'km'; } open = false"
            :class="lang === 'km' ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400' :
                'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
            class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium transition-colors duration-150">
            <div class="flex items-center gap-2">
                <span class="font-semibold uppercase tracking-wide text-xs">KM</span>
                <span>ភាសាខ្មែរ</span>
            </div>
            <svg x-show="lang === 'km'" class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>
