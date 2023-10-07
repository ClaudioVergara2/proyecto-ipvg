@extends('layouts.main')
@section('title', 'Listado De Arriendos')
@section('main-content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mostrarContenido').click(function () {
            $('#contenido').toggle();
        });
    });
</script>
{{--NAV--}}
<nav class="navbar bg-body-tertiary " style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <h1 class="align-self-end">ArriendoAPP</h1>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-primary align-self-end" href="{{ route('logout') }}">Cerrar Sesión</a>
      </form>
    </div>
</nav>
{{--END NAV--}}
    @if($errors->any())
        <div class="alert alert-danger my-4" role="alert">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
    <br>
    <div>
        <div class="row">
            {{--SIDEBARS--}}
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"></svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                      </svg>
                      Dashboard
                      <hr/>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('listado') }}" class="nav-link text-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"></svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                      </svg>
                      Arriendos
                      <hr/>
                    </a>
                  </li>
              </div>
            {{--END SIDEBARS--}}
            <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <h1 class="align-self-end">Arriendos</h1>
                        <a class="btn btn-primary align-self-end" href="{{ route('formulario') }}">Nuevo Arriendo</a>
                    </div>
                    <table class="table">
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
                               @foreach($arrivingMostar->sortBy('id') as $arriving)
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
@endsection
