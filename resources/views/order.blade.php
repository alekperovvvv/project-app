<?php
use App\Http\Controllers\ProductsController;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title></head>
<body>
    <div>
    <h2>{{ $product['name'] }}</h2>
    <p>Цена: {{ $product['cost']}} руб.</p>
</div>
<div class="orderForm">
    @if (\Session::has('success'))
        <div>
            {!! \Session::get('success') !!}
        </div>
    @endif

    <form action="/order" method="post">
        @csrf
        <label for="amount">Количество</label>
        <input type="hidden" name="product_id" value="{{$product['id']}}">
        <input name="amount" type="number" min="0" max="{{$product['amount']}}">
        <button type="submit">Заказать</button>
    </form>
<a href="{{url("/products")}}">вернуться назад</a>
</div>
</body>
</html>
<?php
