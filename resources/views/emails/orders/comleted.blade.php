@component('mail::message')
# Заказ #{{ $order->id }} завершен!

@component('mail::panel')
** Cостав заказа: **
@component('mail::table')
    | Продукт | Кол-во  |
    | :-------| -------:|
    @foreach ($order->products as $product)
    | {{ $product->name }} | {{ $product->pivot->quantity }} |
    @endforeach
@endcomponent

@component('mail::table')
    |                          |            |
    | :------------------------| ----------:|
    | ** Стоимость заказа: **  | ** {{ number_format($order->getPrice()) }} ₽ **  |
@endcomponent

@endcomponent

@component('mail::button', ['url' => route('order.show', $order->id)])
    Просмотреть заказ
@endcomponent

@endcomponent
