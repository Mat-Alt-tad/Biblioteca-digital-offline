@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center text-black">
    <flux:heading size="xl" class="text-black">{{ $title }}</flux:heading>
    <flux:subheading class="text-black">{{ $description }}</flux:subheading>
</div>
