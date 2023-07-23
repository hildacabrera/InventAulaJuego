<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiales') }}
        </h2>
    </x-slot>
    @if (isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endif
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="m-auto" style="width: 95%">
                        @can('crear-Material')
                        <a class="btn btn-primary" href="/Materiales/create">Agregar Material</a>
                        @endcan
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-striped" class="container mt-4">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre del material</th>
                                    <th>Descripción</th>
                                    <th>Tipo de Material</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($material as $material)
                                    <tr>
                                        <td>{{ $material->id }}</td>
                                        <td>{{ $material->nombre }}</td>
                                        <td>{{ $material->descripcion }}</td>
                                        <td>{{ $material->tipo_material_nombre }}</td>                                     
                                        <td>
                                            @can('editar-Material')
                                                <a class="btn btn-primary"
                                                    href="/Materiales/{{ $material->id }}/edit"><small>Modificar</small></a>
                                            @endcan
                                            @can('borrar-Material')
                                                <a class="btn btn-danger"
                                                    href="/Materiales/{{ $material->id }}/confirmDelete"><small>Eliminar</small></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
