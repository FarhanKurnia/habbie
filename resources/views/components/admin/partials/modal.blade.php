<button class="btn bg-danger text-white" onclick="{{"dialog" . str_replace('-', '_', $slug)}}.showModal()">Delete</button>
<dialog id="{{ "dialog" . str_replace('-', '_', $slug) }}" class="modal">
    <form method="dialog" class="modal-box">
        <h3 class="font-bold text-lg">{{ $title }}</h3>
        <p class="py-4">{{ $description }}</p>
        <div class="modal-action">
            <a class="btn bg-danger bg-opacity-75 hover:bg-danger text-white" href="{{ route($routeName, $slug) }}">{{$action}}</a>
            <button class="btn">Close</button>
        </div>
    </form>
</dialog>
