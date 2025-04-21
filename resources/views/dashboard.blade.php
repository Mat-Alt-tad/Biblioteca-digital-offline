<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-green-200 dark:border-green-700 flex justify-center items-center">
                <a href="{{route('libros.index')}}"><div><h2>Libros</h2></div></a>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-green-200 dark:border-green-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-green-900/20 dark:stroke-green-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-green-200 dark:border-green-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-green-900/20 dark:stroke-green-100/20" />
            </div>
        </div>
    </div>
</x-layouts.app>
