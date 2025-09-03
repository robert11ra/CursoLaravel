<x-forum.layouts.app>
    <form action="{{ route('questions.store') }}" method="POST" class="max-w-2xl mx-auto p-6">
        @csrf

        <h1 class="text-2xl font-bold mb-4">Hacer una Pregunta</h1>

        @include('questions._form')

        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-500">
            Crear
        </button>
    </form>
</x-forum.layouts.app>