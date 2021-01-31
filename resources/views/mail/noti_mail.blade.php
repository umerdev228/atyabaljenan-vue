<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Order</title>
</head>
<body>
<div>
    <h3>Congratulation New Order Arrived</h3>
    <p>You have a new order
        <a target="_blank" href="{{ url('admin/order/details/'.$order->id) }}">#{{ $order->order_number }}</a>
    </p>
</div>


</body>
</html>
