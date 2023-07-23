<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipo Materiales') }}
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
                        @can('crear-Tipo_Material')
                            <a class="btn btn-primary" href="/Tipo_Materiales/create">Agregar tipo de material</a>
                        @endcan
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo de material</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipo_material as $tipo_material)
                                    <tr>
                                        <td>{{ $tipo_material->id }}</td>
                                        <td>{{ $tipo_material->nombre }}</td>
                                        <td>
                                            @can('editar-Tipo_Material')
                                                <a class="btn btn-primary"
                                                href="/Tipo_Materiales/{{ $tipo_material->id }}/edit"><small>Modificar</small></a>
                                            @endcan
                                            @can('borrar-Tipo_Material')
                                                <a class="btn btn-danger"
                                                href="/Tipo_Materiales/{{ $tipo_material->id }}/confirmDelete"><small>Eliminar</small></a>
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
</x-app-layout>
