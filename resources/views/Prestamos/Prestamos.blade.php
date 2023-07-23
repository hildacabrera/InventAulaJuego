<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prestamos') }}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="formPrestamo"="{{ route('consultarPrestamos') }}" method="POST">
                    @csrf
                <div class="p-6 text-gray-900">
                    <br>
                    <br>
                    <div>

                            <div class="container col-12">
                                <div id="dropdown">
                                    <h4>Buscar Préstamos por Gestor</h4>
                                    <select name="persona" class="form-control" onchange="this.form.submit()">
                                        <option value="" disabled="disabled">Selecciona un Gestor</option>
                                        @foreach ($superPantalla['ListaGestores'] as $usuario)
                                            <option value="{{ $usuario->id }}"
                                                @if ($usuario->id == $superPantalla['ValorGestor']) selected @endif>
                                                {{ $usuario->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                            </div>
                        <div id="grillaPrestamo">
                            <div class="table-responsive" style="width: 95%; margin: 0 auto">
                                <table class="table table-striped" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <td>
                                                <b>Material</b>
                                            </td>
                                            <td>
                                                <b>Descripción</b>
                                            </td>
                                            <td>
                                                <b>Cantidad</b>
                                            </td>
                                            <td>
                                                <b>Fecha Préstamo</b>
                                            </td>
                                            <td>
                                                <b>Acción</b>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($superPantalla['ListaPrestamoPersonal']) > 0)
                                            @foreach ($superPantalla['ListaPrestamoPersonal'] as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->nombre }}
                                                    </td>
                                                    <td>
                                                        {{ $item->descripcion }}
                                                    </td>
                                                    <td>
                                                        {{ $item->cantidad }}
                                                    </td>
                                                    <td>
                                                        {{ $item->fecha_prestamo }}
                                                    </td>

                                                    <td>
                                                        <a onclick="submitFormDevolver(event, {{ $item->id }})"
                                                            class="btn btn-warning"><small>Devolver</small></a>
                                                    </td>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div class="container col-12">
                            <div id="dropdown">
                                <h4>Buscar por Material</h4>
                                <select name="material" class="form-control" onchange="this.form.submit()">
                                    <option value="" disabled="disabled">Selecciona Material</option>
                                    @foreach ($superPantalla['ListaMaterial'] as $material)
                                        <option value="{{ $material->id }}"
                                            @if ($material->id == $superPantalla['ValorMaterial']) selected @endif>
                                            {{ $material->nombre }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                        </div>
                        <div id="grillaPrestamo">
                            <div class="table-responsive" style="width: 95%; margin: 0 auto">
                                <table class="table table-striped" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <td>
                                                <b>Material</b>
                                            </td>
                                            <td>
                                                <b>Fecha Ingreso</b>
                                            </td>
                                            <td>
                                                <b>Cantidad</b>
                                            </td>
                                            <td>
                                                <b>Acción</b>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($superPantalla['ListaMaterialesStock']) > 0)
                                            @foreach ($superPantalla['ListaMaterialesStock'] as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->nombre }}
                                                    </td>
                                                    <td>
                                                        {{ $item->fecha_ingreso }}
                                                    </td>
                                                    <td>
                                                        {{ $item->cantidad }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success"
                                                            onclick="submitFormPrestar(event, {{ $item->id }})"><small>Prestar</small></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input name="idDevolver" type="hidden" />
                    <input name="idPrestar" type="hidden" />
                    <input name="idAccion" type="hidden" />
                    {{--  </form>  --}}
                    <script>
                        function submitFormDevolver(event, idDevolver) {
                            var form = document.getElementById('formPrestamo');
                            document.querySelector('[name="idDevolver"]').value = idDevolver;
                            document.querySelector('[name="idAccion"]').value = "Devolver";
                            form.submit();

                        }

                        function submitFormPrestar(event, idPrestar) {
                            var form = document.getElementById('formPrestamo');
                            document.querySelector('[name="idPrestar"]').value = idPrestar;
                            document.querySelector('[name="idAccion"]').value = "Prestar";
                            form.submit();
                        }
                    </script>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>