<x-layouts.app :title="$title ?? null">
    <div class="bg-white flex min-h-svh flex-col items-center justify-start  ">
        <div class="flex w-full max-w-sm flex-col  ">
            <a href="{{ route('/') }}" class="flex flex-col items-center  font-medium" wire:navigate>
                <span class="flex h-16 w-16  items-center justify-center rounded-md">
                    <x-app-logo-icon class="fill-current text-black dark:text-black" />
                </span>
            </a>
            <div class="flex flex-col ">
                {{ $slot }}
            </div>
        </div>
    </div>
        @fluxScripts
</x-layouts.app>
