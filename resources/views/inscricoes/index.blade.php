@extends('master')

@section('breadcrumb', 'Home')

@section('title', 'Home')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Eventos</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Evento nº</th>
                    <th>Nome</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->eventos_id }}</td>
                        <td>{{ $evento->nome }}</td>
                        <td>{{ $evento->data_inicial }}</td>
                        <td>{{ $evento->data_final }}</td>
                        <td>
                            <form method="POST" action="{{ route('inscricao.destroy', ['inscricao' => $evento->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Cancelar Inscrição" class="btn btn-success" style="font-size: smaller;">
                                    <i class="fa fa-eye fa-fw"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection