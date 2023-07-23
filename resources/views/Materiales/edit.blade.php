<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiales') }}
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
                    <form action="/Materiales/{{ $material->id }}"method="POST">
                        @csrf
                        @method('put')
                        <div class="container mt-3">
                            <h5>Editar Material</h5>
                            <br>
                            <div class="mb-3">
                                <label for="nombre">Nombre del Material:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $material->nombre }}">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"value="{{ $material->descripcion }}">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_material_id"> Nombre del Material:</label>
                                <select class="form-control" id="tipo_material_id" name="tipo_material_id" value="{{ $material->tipo_material_id }}">
                                    @foreach ($tipo_material as $tipo_material)
                                        @if ($tipo_material->id == $material->tipo_material_id)
                                            <option value="{{ $tipo_material->id }}"selected>
                                                {{ $tipo_material->nombre }}</option>
                                        @else
                                            <option value="{{ $tipo_material->id }}">{{ $tipo_material->nombre }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <a class="btn btn-primary" href="/Materiales">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
