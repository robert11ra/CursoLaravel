<div>
    <ul class="my-4 space-y-2">

        <!-- foreach / comments -->
        @foreach ($comments as $comment)
            <li class="flex items-center gap-2">
                <p class="text-xs bg-white/10 p-4 rounded-md">
                    <span class="text-gray-500">
                        {{ $comment->user->name }}
                    </span>
                    <br>
                    <span class="text-gray-300">
                        {{ $comment->content }}
                    </span>
                    <br>

                    <span class="text-gray-500">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>

                </p>

                <livewire:heart :heartable="$comment" />
            </li>
        @endforeach
        <!-- endforeach -->

    </ul>
    @if (!$showForm)
        <p class="text-gray-500">
            <a wire:click="toggle" class="rounded-md text-xs hover:underline cursor-pointer">
                Agregar comentario
            </a>
        </p>
    @else
        <form wire:submit="add">
            <div class="flex gap-2">
                <input type="text" wire:model="content" class="w-full text-xs outline-none"
                    placeholder="Escribe tu comentario aquí..." required autofocus>

                <button type="button" wire:click="toggle"
                    class="text-xs text-gray-300 hover:underline cursor-pointer">Cancelar</button>
                <button type="submit"
                    class="text-xs text-white bg-blue-600 hover:bg-blue-500 rounded-md px-2 py-1 cursor-pointer">
                    Comentar
                </button>
            </div>
            @error('content')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </form>
    @endif
</div>
