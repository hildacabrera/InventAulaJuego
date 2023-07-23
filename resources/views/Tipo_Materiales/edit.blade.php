<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipo_Materiales') }}
        </h2>
    </x-slot>
    @if ($errors != null && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/Tipo_Materiales/{{ $tipo_material->id }}"method="POST">
                        @csrf
                        @method('put')
                        <div class="container mt-3">
                            <h5>Editar Tipo de Material</h5>
                            <br>
                            <div class="mb-3">
                                <label for="nombre">Tipo de Material:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ $tipo_material->nombre }}">
                            </div>
                            <a class="btn btn-primary" href="/Tipo_Materiales">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
