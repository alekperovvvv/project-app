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

    @if (count($orders) < 1)
        <p>У вас нет заказов.</p>
        <a href="{{url("/products")}}">вернуться назад</a>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Продукт</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order['product']->name }}</td>
                        <td>{{ $order['amount'] }}</td>
                        <td>{{ $order['product']->cost }}</td>
                        <td>{{ $order['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
