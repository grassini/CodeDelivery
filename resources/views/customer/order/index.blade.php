@extends('app')

@section('content')
    <div class="container">
        <h3>Meus Pedidos</h3>


        <a href="{{ route('customer.order.create') }}" class="btn btn-default">Novo Pedido</a>
        <br/><br/>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->total}}</td>

                    @if($order->status == 0)
                        <td>Pendente</td>
                        @elseif($order->status == 1)
                            <td>A Caminho</td>
                        @elseif($order->status == 2)
                            <td>Entregue</td>
                        @elseif($order->status == 3)
                            <td>Cancelado</td>
                    @endif
            </tr>
            @endforeach
            </tbody>

        </table>

        {!! $orders->render() !!}


@endsection



    </div>