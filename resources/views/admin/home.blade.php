@extends('layouts.main')
@section('main-content')

<div class="container py-4">

    <div class="d-flex justify-content-between">
        <h1 class="align-self-end">ArriendoAPP</h1>
        <a class="btn btn-primary align-self-end" href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>

    <hr />

    @if($errors->any())
        <div class="alert alert-danger my-4" role="alert">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Arriendos</button>
                    </div>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h1 class="section-separator mb-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="section-separator mb-4">Vehiculos existentes en cada categorias</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Cantidad de Vehículos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories->sortBy('id') as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->vehicles->count() }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6 col-md-4">
                                <h4 class="section-separator mb-4">Total de arriendos registrados</h4>
                                <h1 class="display-1 text-center">({{ $arriving->count() }})</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="d-flex justify-content-between">
                            <h1 class="align-self-end">Arriendos</h1>
                            <a class="btn btn-primary align-self-end" href="">Nuevo Arriendo</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Rut</th>
                                    <th>Patente</th>
                                    <th>Entrega</th>
                                    <th>Devolucion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arriving->sortBy('id') as $arriving)
                                <tr>
                                    <td>{{ $arriving->name }} {{ $arriving->surname }}</td>
                                    <td>{{ $arriving->rut }}</td>
                                    <td>{{ $arriving->patent }}</td>
                                    <td>{{ $arriving->fechaEntrega }}</td>
                                    <td>{{ $arriving->fechaDevolucion }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



