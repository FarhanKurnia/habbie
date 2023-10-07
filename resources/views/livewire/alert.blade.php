<div>
    @if ($visible)
        <div class="{{ $background }} text-white p-4 font-bold flex justify-center gap-6 items-center">
            <p>{{ $message }}</p>
            <button wire:click="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
