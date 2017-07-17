@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Página desenvolvida por</h1>
    <hr>
    <div class="row placeholders">
        <div class="col-xs-12 col-sm-4 placeholder">
            <img src="{{ asset('imagens/filipe.jpg') }}" class="img-responsive imghome" alt="Generic placeholder thumbnail">
            <h4>Filipe Silva</h4>
            <span class="text-muted">&quot;10238&quot;</span>
        </div>
        <div class="col-xs-12 col-sm-4 placeholder">
            <img src="{{ asset('imagens/afonso.jpg') }}" class="img-responsive imghome" alt="Generic placeholder thumbnail">
            <h4>Afonso Pereira</h4>
            <span class="text-muted">&quot;10131&quot;</span>
        </div>
        <div class="col-xs-12 col-sm-4 placeholder">
            <img src="{{ asset('imagens/ricardo.jpg') }}" class="img-responsive imghome" alt="Generic placeholder thumbnail">
            <h4>Ricardo Carvalho</h4>
            <span class="text-muted">&quot;10198&quot;</span>
        </div>
    </div>
    <hr>
    <h4 class="port">Copyright &copy; 2017 Todos os direitos reservados.</h4>
</div>
@stop