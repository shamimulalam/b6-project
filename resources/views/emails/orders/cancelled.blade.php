@component('mail::message')
# Dear {{ $order->last_name }},

Your order id - {{ $order->order_id }} has been cancelled. Please contact with support for any query.

@component('mail::button', ['url' => route('front.home')])
Visit our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
