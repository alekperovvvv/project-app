<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администратор</title>
</head>
<body>
    <h1>Администрирование заказов:</h1>

    @if (\Session::has('warning'))
        <div>
            {!! \Session::get('warning') !!}
        </div>
    @endif
    @if (\Session::has('success'))
        <div>
            {!! \Session::get('success') !!}
        </div>
    @endif

    <h4>Поменять статус</h4>
    <form action="/updateOrder" method="post">
        @csrf
        <label for="id">id заказа</label>
        <input name="id" type="number">
        <label for="list">Новый статус:</label>
        <select id="list" name="status">
            <option value="новый">новый</option>
            <option value="одобрен">одобрен</option>
            <option value="доставлен">доставлен</option>
        </select>
        <button type="submit">Сменить</button>
    </form>

    @if (count($orders) < 1)
        <p>На сайте нет заказов.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название товара</th>
                <th>Количество</th>
                <th>Дата создание</th>
                <th>Email пользователя</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order['id'] }}</td>
                    <td>{{ $order['product'] }}</td>
                    <td>{{ $order['amount'] }}</td>
                    <td>{{ $order['date'] }}</td>
                    <td>{{ $order['email'] }}</td>
                    <td>{{ $order['status'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
