<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="m-auto" style="width: 95%">
                        @can('crear-rol')
                            <a href="{{ url('Roles/create') }}" class="btn btn-primary">Nuevo rol</a>
                        @endcan
                    </div>
                    <br>
                    <div class="table-responsive" style="width: 95%; margin: 0 auto">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Rol</th>
                                    <th>Permisos</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $rol)
                                    <tr>
                                        <td class="align-middle">{{ $rol->name }}</td>
                                        <td>
                                            @forelse ($rol->permissions as $permission)
                                                <div class="text-bg-info btn-primary btn-sm d-inline-block" style="padding: 0 .5rem">{{ $permission->name }}</div>
                                            @empty
                                                <span class="text-bg-danger">No tiene permisos</span>
                                            @endforelse
                                        </td>
                                        <td class="align-middle">
                                            @can('editar-rol')
                                                <a href="{{ url('Roles/' . $rol->id . '/edit') }}" class="fa fa-pencil"></a>
                                            @endcan
                                        </td>
                                        <td class="align-middle">
                                            @can('borrar-rol')
                                               <a href="{{ url('Roles/' . $rol->id . '/confirmDelete') }}" class="fa-sharp fa-solid fa-eraser" style="color: white"></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hay roles</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
