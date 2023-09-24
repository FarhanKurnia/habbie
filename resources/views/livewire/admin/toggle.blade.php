<div class="flex items-center gap-2">
    <input type="checkbox" class="toggle" {{ $status === 'active' ? 'checked' : ' ' }} wire:click="setStatus"/>
    <p class="text-sm">{{ $status }}</p>
</div>
