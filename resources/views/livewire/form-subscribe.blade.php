<div>
    <form action="" wire:submit.prevent="submitSubscribe" method="POST">
        <div class="flex lg:flex-row flex-col gap-3 items-center">
            {{ csrf_field() }}
            <input class="input input-bordered lg:w-2/3 max-w-xs rounded-full" type="text" wire:model="email"
                placeholder="Your Email" required>
            @error('email')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror
            <input class="btn btn-primary lg:w-1/3 rounded-full font-bold text-white" type="submit" value="Subscribe">
        </div>
    </form>
</div>
