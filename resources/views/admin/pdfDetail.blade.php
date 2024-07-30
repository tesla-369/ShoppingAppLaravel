<base href="/public">
<h1>Invoice</h1>
<p>Name: {{ $order->user_name }}</p>
<p>Email: {{ $order->email }}</p>
<p>Phone: {{ $order->phone }}</p>
<p>Product Name: {{ $order->product_name }}</p>
<p>Quantity: {{ $order->quantity }}</p>
<p>Price: {{ $order->price }}</p>
<img src="product/{{$order->image}} " alt="Product Image">
