<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestores') }}
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
                    <form action="/Gestores/{{ $gestor->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="container mt-3">
                            <h5>Editar Gestor</h5>
                            <br>
                            <div class="mb-3">
                                <label for="nombre">Nombre Gestor:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ $gestor->nombre }}">
                            </div>
                            <div class="mb-3">
                                <label for="apellido">Apellido Gestor:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    value="{{ $gestor->apellido }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">E-mail:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $gestor->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña"
                                    value="{{ $gestor->contraseña }}">
                            </div>
                            <a class="btn btn-primary" href="/Gestores">Regresar</a>
                            <button type="submit" class="btn btn-primary ">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
