<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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
                    <form action="{{ route('Roles.store') }}" method="post">
                        @csrf
                        <div class="container mt-3">
                            <h5>Crear Rol</h5>
                            <br>
                            <div class="mb-3">
                                <label for="name">Nombre del rol:</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="permission">Permisos del rol:</label>
                                <div>
                                    <table class="table">
                                        <tbody>
                                            @foreach ($permission as $id => $permission)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input id="permission{{ $id }}"
                                                                class="form-check-input" type="checkbox"
                                                                name="permission[]" value="{{ $id }}">
                                                            <label for="permission{{ $id }}"
                                                                class="form-check-label">{{ $permission }}</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Guardar</button>
                            <a href="{{ route('Roles.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>