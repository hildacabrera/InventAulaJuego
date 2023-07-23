<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="row">
                        <div id="white">

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                                style="width: 50%; margin: 0 auto;">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('Imagenes/Imagen8.jpeg') }}" class="d-block w-100"
                                            alt="Imagen 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('Imagenes/Imagen4.jpeg') }}" class="d-block w-100"
                                            alt="Imagen 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('Imagenes/Imagen01.png') }}" class="d-block w-100"
                                            alt="Imagen 3">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="sr-only">Siguiente</span>
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    
                                </a>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            <br>
                            <style type="text/css">
                                span.sr-only {
                                    width: auto;
                                    height: auto;
                                    position: initial;
                                    padding: initial;
                                    margin: initial;
                                    overflow: initial;
                                }
                            </style>
                            <div class="row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Bases de Datos Multidisciplinarias</h5>
                                            <p class="card-text">EBSCO Open Dissertations: EBSCO Open Dissertations
                                                incluye el contenido de
                                                American Doctoral Dissertations, la cual es una base de datos gratuita
                                                con registros de más
                                                de 1.2 millones de tesis y disertaciones electrónicas de todo el mundo.
                                            </p>
                                            <a href="EBSCO Open Dissertations: EBSCO Open Dissertations incluye el contenido de American Doctoral Dissertations, la cual es una base de datos gratuita con registros de más de 1.2 millones de tesis y disertaciones electrónicas de todo el mundo."
                                                class="btn btn-primary">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Recursos educativos digitales e interactivos</h5>
                                            <p class="card-text">Transmedialiteracy: Educación y tecnologías de la
                                                información</p>
                                            <a href="https://transmedialiteracy.org/" class="btn btn-primary">Ver
                                                más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div id="white" class="d-flex justify-content-start">
                            <div class="card" style="width: 25rem;">
                                <img src="{{ asset('Imagenes/Imagen3.jpeg') }}" class="card-img-top" alt="...">

                            </div>
                            <div class="row" style="margin-left: 0.50rem">
                                <div class="mb-3 mb-sm-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Acerca del Aula del Juego</h5>
                                            <p class="card-text">Sistema de Inventarios que permite la administración y
                                                el control de materiales
                                                didacticos de Aula del Juego</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Materiales</li>
                                            <li class="list-group-item">Cursos</li>
                                            <li class="list-group-item">Talleres</li>
                                        </ul>
                                        <div class="card-body">
                                            <a href="https://www.iudigital.edu.co/CRAI/Paginas/default.aspx"
                                                class="card-link">CRAI</a>
                                            <a href="https://www.iudigital.edu.co/CRAI/Paginas/default.aspx"
                                                class="card-link">Bases de Datos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
