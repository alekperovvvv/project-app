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
                        <td>{{ $orders->id }}</td>
                        <td>{{ $orders->amount }}</td>
                        <td>{{ $orders->total_price }}</td>
                        <td>{{ $orders->user_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>