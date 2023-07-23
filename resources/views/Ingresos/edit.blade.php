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
                    <form action="/Ingresos/{{ $ingreso->id }}"method="POST">
                        @csrf
                        @method('put')
                        <div class="container mt-3">
                            <h5>Editar Ingreso de Material</h5>
                            <br>
                            <div class="mb-3">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $ingreso->cantidad }}">
                            </div>
                            <div class="mb-3">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ $ingreso->fecha_ingreso }}">
                            </div>
                            <div class="mb-3">
                                <label for="proveedor">Proveedor:</label>
                                <input type="text" class="form-control" id="proveedor" name="proveedor" value="{{ $ingreso->proveedor }}">
                            </div>
                            <div class="mb-3">
                                <label for="material_id">Nombre del Material:</label>
                                <select class="form-control" id="material_id" name="material_id"
                                    value="{{ $ingreso->material_id }}">
                                    @foreach ($material as $material)
                                        @if ($material->id == $ingreso->material_id)
                                            <option value="{{ $material->id }}"selected>{{ $material->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="users_id">Nombre del Usuario:</label>
                                <select class="form-control" id="users_id" name="users_id"
                                    value="{{ $ingreso->users_id }}">
                                    @foreach ($users as $users)
                                        @if ($users->id == $ingreso->users_id)
                                            <option value="{{ $users->id }}" selected>{{ $users->name }}</option>
                                        @else
                                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <a class="btn btn-primary" href="/Ingresos">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
