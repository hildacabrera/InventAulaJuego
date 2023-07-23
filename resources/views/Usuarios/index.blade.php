<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
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
                        @can('crear-Usuario')
                            <a class="btn btn-primary" href="/Usuarios/create">Agregar Usuario</a>
                        @endcan
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>E-mail</th>
                                    <th>Rol</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            @if (!@empty($usuario->getRoleNames()))
                                                @foreach ($usuario->getRoleNames() as $rolName)
                                                    {{ $rolName }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('editar-Usuario')
                                                <a class="btn btn-primary"
                                                    href="/Usuarios/{{ $usuario->id }}/edit"><small>Modificar</small></a>
                                            @endcan
                                            @can('borrar-Usuario')
                                                <a class="btn btn-danger"
                                                    href="/Usuarios/{{ $usuario->id }}/confirmDelete"><small>Eliminar</small></a>
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
