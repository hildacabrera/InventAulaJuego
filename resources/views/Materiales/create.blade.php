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
                    
                    <form action="/Materiales" method="POST">
                        @csrf
                        <div class="container mt-3">
                            <h5>Crear Tipo de Material</h5>
                            <br>
                            <div class="mb-3">
                                <label for="nombre">Nombre del material:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_material_id">Tipo de Material:</label>
                                <select class="form-control" id="tipo_material_id" name="tipo_material_id">
                                    @foreach ($material as $material)
                                        <option value="{{ $material->id }}">{{ $material->nombre }}
                                        </option>
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
