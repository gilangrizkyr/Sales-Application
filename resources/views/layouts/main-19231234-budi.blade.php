<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">
    <nav style="background-color: #4CAF50; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <ul style="list-style-type: none; padding: 0; text-align: center;">
            <li style="display: inline; margin-right: 15px;"><a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">Dashboard</a></li>
            <li style="display: inline; margin-right: 15px;"><a href="{{ route('products.index') }}" style="color: white; text-decoration: none;">Produk</a></li>
            <li style="display: inline;"><a href="{{ route('sales.index') }}" style="color: white; text-decoration: none;">Penjualan</a></li>
        </ul>
    </nav>

    <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @yield('content')
    </div>
</body>
</html>
