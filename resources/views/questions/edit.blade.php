<x-forum.layouts.app>
    <form action="{{ route('questions.update', $question) }}" method="POST" class="max-w-2xl mx-auto p-6">
        @csrf
        @method('PUT')

        <h1 class="text-2xl font-bold mb-4">Editar Pregunta</h1>

        @include('questions._form')

        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-500">
            Actualizar
        </button>
    </form>
</x-forum.layouts.app>