<div>
    <form action="" wire:submit.prevent="submitSubscribe" method="POST">
        <div class="flex lg:flex-row flex-col gap-2 items-center">
            {{ csrf_field() }}
            <input class="input input-bordered lg:w-2/3 w-full max-w-xs rounded-full" type="text" wire:model="email"
                placeholder="Your Email" required>
            @error('email')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror
            <input class="btn btn-primary rounded-full font-bold text-white lg:w-1/4 w-full" type="submit" value="Subscribe">
        </div>
    </form>
</div>
