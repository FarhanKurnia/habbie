<div class="flex flex-row rounded-md font-bold items-center text-md lg:text-md">
    <button wire:click="decrement" class="lg:p-2 px-4 cursor-pointer">-</button>
    <input type="number" wire:model="quantity" min="1" wire:change="updateCart"
        class="py-2 focus:outline-none text-center w-full bg-grey-secondary-50 rounded-md font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700 outline-none">
    <button wire:click="increment" class="lg:p-2 px-4 cursor-pointer">+</button>
</div>
