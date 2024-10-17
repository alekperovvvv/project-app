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
    <form action="/order" method="post">        
        @csrf        
        <label for="amount">Количество</label>
        <input name="amount" type="number" min="0" max="{{$product['amount']}}">        
        <button type="submit">Заказать</button>
    </form>
<a href="{{url("/products")}}">вернуться назад</a>
</div>
</body>
</html>
<?php