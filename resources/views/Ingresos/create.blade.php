<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingresos') }}
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
                    <form action="/Ingresos" method="POST">
                        @csrf
                        <div class="container mt-3">
                            <h5>Crear Ingreso de Material</h5>
                            <br>
                            <div class="mb-3">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad">
                            </div>
                            <div class="mb-3">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                            </div>
                            <div class="mb-3">
                                <label for="proveedor">Proveeedor:</label>
                                <input type="text" class="form-control" id="proveedor" name="proveedor">
                            </div>
                            <div class="mb-3">
                                <label for="material_id">Nombre del Material:</label>
                                <select class="form-control" id="material_id" name="material_id">
                                    @foreach ($material as $material)
                                        <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="users_id">Nombre del Usuario:</label>
                                <select class="form-control" id="users_id" name="users_id">
                                    @foreach ($users as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="btn btn-primary" href="/Ingresos">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
