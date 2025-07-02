@extends('base')
@section('titulo', 'Formulário de Pedido')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">Formulário de Pedido</h3>

    @php
        $action = !empty($dado->id) ? route('pedido.update', $dado->id) : route('pedido.store');
    @endphp

    <form action="{{ $action }}" method="post" class="row g-3">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <div class="col-md-4">
            <label for="codigo" class="form-label">Código</label>
            <input
                type="text"
                name="codigo"
                id="codigo"
                value="{{ old('codigo', $dado->codigo ?? '') }}"
                class="form-control border-success"
                placeholder="Código do pedido"
                required
            >
        </div>

        <div class="col-md-4">
            <label for="data" class="form-label">Data</label>
            <input
                type="date"
                name="data"
                id="data"
                value="{{ old('data', isset($dado->data) ? \Carbon\Carbon::parse($dado->data)->format('Y-m-d') : '') }}"
                class="form-control border-success"
                required
            >
        </div>

        <div class="col-md-4">
            <label for="total" class="form-label">Total (R$)</label>
            <input
                type="number"
                step="0.01"
                name="total"
                id="total"
                value="{{ old('total', $dado->total ?? '') }}"
                class="form-control border-success"
                placeholder="Total do pedido"
                required
            >
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success me-2">Salvar</button>
            <a href="{{ url('pedido') }}" class="btn btn-outline-success">Voltar</a>
        </div>
    </form>
</div>

@stop
