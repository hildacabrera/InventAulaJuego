<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestores') }}
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
                        @can('crear-Gestor')
                            <a class="btn btn-primary" href="/Gestores/create">Agregar Gestor</a>
                        @endcan
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre Gestor</th>
                                    <th>Apellido Gestor</th>
                                    <th>E-mail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gestor as $gestor)
                                    <tr>
                                        <td>{{ $gestor->id }}</td>
                                        <td>{{ $gestor->nombre }}</td>
                                        <td>{{ $gestor->apellido }}</td>
                                        <td>{{ $gestor->email }}</td>
                                        <td>
                                            @can('editar-Gestor')
                                                <a class="btn btn-primary"
                                                href="/Gestores/{{ $gestor->id }}/edit"><small>Modificar</small></a>
                                            @endcan
                                            @can('borrar-Gestor')
                                                <a class="btn btn-danger"
                                                href="/Gestores/{{ $gestor->id }}/confirmDelete"><small>Eliminar</small></a>
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
