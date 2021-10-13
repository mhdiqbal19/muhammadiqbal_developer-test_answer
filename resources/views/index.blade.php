<html>
<head></head>
<body>
    {{-- $productBestSelling = Product::getBestSelling();
        $customerPurchase = Customer::withCount('orders')->get();
        $mostUnsold = Product::getMostUnsold(5); --}}

    Best Selling Product:

    <pre>
        {{ $productBestSelling[0] }} : {{ $productBestSelling[1] }} times sold.
    </pre>

    <br>
    Customer Purcase:

    <pre>
        @foreach ($customerPurchase as $c)
            {{ $c->name }} : {{ $c->orders_count }} purchases.
        @endforeach
    </pre>

    The Most Unsold Products
    <pre>
        @foreach ($mostUnsold as $p)
            {{ $p->name }} : {{ $p->countSold->countProductId }} time sold.
        @endforeach
    </pre>
</body>
</html>
