<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваши Заказы</title>
</head>
<body>
@section('content')
    <h1>Ваши Заказы</h1>

    @if ($orders->isEmpty())
        <p>У вас нет заказов.</p>
        <a href="{{url("/products")}}">вернуться назад</a>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Дата</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>