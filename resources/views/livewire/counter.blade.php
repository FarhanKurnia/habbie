<div class=" w-1/2 lg:w-1/5 flex flex-row rounded-md font-bold items-center">
    <button wire:click="decrement" class="p-2 cursor-pointer">-</button>
    <input type="number" wire:model="count" class="py-2 focus:outline-none text-center w-full bg-grey-secondary-50 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700 outline-none">
    <button wire:click="increment" class="p-2 cursor-pointer">+</button>
</div>
