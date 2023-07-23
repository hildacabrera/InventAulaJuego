<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingresos') }}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="m-auto" style="width: 95%">
                        @can('crear-Ingreso')
                            <a class="btn btn-primary" href="/Ingresos/create">Agregar Ingreso de Material</a>
                        @endcan                        
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cantidad</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Proveedor</th>
                                    <th>Nombre del Material</th>
                                    <th>Nombre del Usuario</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingreso as $ingreso)
                                    <tr>
                                        <td>{{ $ingreso->id }}</td>
                                        <td>{{ $ingreso->cantidad }}</td>
                                        <td>{{ $ingreso->fecha_ingreso }}</td>
                                        <td>{{ $ingreso->proveedor }}</td>
                                        <td>{{ $ingreso->nombre_material }}</td>
                                        <td>{{ $ingreso->nombre_usuario }}</td>
                                        <td>
                                            @can('editar-Ingreso')
                                                <a class="btn btn-primary"
                                                    href="/Ingresos/{{ $ingreso->id }}/edit"><small>Modificar</small></a>
                                            @endcan
                                            @can('borrar-Ingreso')
                                                <a class="btn btn-danger"
                                                    href="/Ingresos/{{ $ingreso->id }}/confirmDelete"><small>Eliminar</small></a>
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
