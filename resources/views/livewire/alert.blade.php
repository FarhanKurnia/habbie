<div>
    @if ($visible)
        <div class="{{ $background }} text-white rounded-lg p-2 font-bold flex justify-between items-center">
            <p>{{ $message }}</p>
            <button wire:click="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
