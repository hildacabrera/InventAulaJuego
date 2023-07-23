<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
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
    {{-- <form action="/Usuarios" method="POST"> --}}
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/Usuarios/{{ $user->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="container mt-3">
                            <h5>Editar Usuario</h5>
                            <br>
                            <div class="mb-3">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">E-mail:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="">
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password">Confirmar password:</label>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="confirm-password" value="">
                            </div>
                            <div class="mb-3">
                                <label for="name">Rol:</label>
                                <div>
                                    <select name="roles" id="roles" class="form-select" required>
                                        <option value="" disabled="disabled">Seleccionar el rol</option>
                                        @foreach ($roles as $id => $rol)
                                            @if ($id == $user->id)
                                                <option value="{{ $id }}" selected="selected">
                                                    {{ $rol }}</option>
                                            @else
                                                <option value="{{ $id }}">{{ $rol }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="/Usuarios">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
