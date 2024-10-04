<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продукты</title>
</head>
<body>
    <div>
        @foreach ($products as $product)
            <div>
                <h3>{{ $product->name }}</h3>
                <p>Цена: {{ ($product->cost) }} руб.</p>
                <p>{{ $product->amount > 0 ? 'Количество: ' . $product->amount : 'Нет в наличии' }}</p>
                <a href="{{url("/products/$product->id")}}">подробнее</a>
             </div>
        @endforeach
    </div>
    <div>
        <a href="{{url("/login")}}">Выход</a>
        <a href="{{url("/orderlist")}}">Ваши заказы</a>
    </div>
</body>
</html>