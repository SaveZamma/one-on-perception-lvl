<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Marketplace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .scroll-container {
            max-height: 80vh;
            overflow-y: auto;
            padding: 10px;
            scroll-behavior: smooth;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card h2 {
            font-size: 18px;
            margin: 10px 0;
        }
        .card p {
            color: #555;
        }
        .btn {
            background-color: #3b82f6;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Product Marketplace</h1>
        <div class="scroll-container">
            <div class="grid">
                <?php
                    $products = [
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://via.placeholder.com/150'],
                        ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://via.placeholder.com/150'],
                    ];
                    foreach ($products as $product) {
                        echo "<div class='card'>
                                <img src='{$product['image']}' alt='{$product['name']}'>
                                <h2>{$product['name']}</h2>
                                <p>{$product['price']}</p>
                                <button class='btn'>Buy Now</button>
                              </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
