<?php   

    require 'b1.php';

    $product_list =null;
    $message ="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $id = htmlspecialchars($_POST['productId']);
            $name = htmlspecialchars($_POST['productName']);
            $brand = htmlspecialchars($_POST['brandName']);
            $price = htmlspecialchars($_POST['productPrice']);
            $total_quantity = htmlspecialchars($_POST['stockQuantity']);
            if($id <1 || empty($name) || empty($brand) || $price<0|| $total_quantity<0){
                throw new Exception('Vui lòng nhập đầy đủ và chính xác các thông tin');
        }
        $product_list = new Product_list($id, htmlspecialchars($name_trimmed), htmlspecialchars($brand_trimmed), $price, $total_quantity, $status);

        $message = "Thông tin đã được lưu thành công!";
    }
    catch (Exception $e){
        $message = 'Lỗi' . $e ->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container > div { 
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px); 
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; 
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div>
        <div><h1>Quản lý sản phẩm</h1></div>
    </div>
    <div class="container"> 
        <div class="add-product">
            <h2>Thêm sản phẩm</h2>
            <form action="" method="POST">
                <input type="number" id="productId" name ="productId" placeholder="Mã sản phẩm">
                <input type="text" id="productName" name="productName" placeholder="Tên sản phẩm">
                <input type="text" id="brandName" name="brandName" placeholder="Thương hiệu">
                <input type="number" id="productPrice" name="productPrice" placeholder="Giá">
                <input type="text" id="stockQuantity" name="stockQuantity" placeholder="Tồn kho">">
                <button type="submit">Thêm</button> 
            </form>
        </div>
        <div class="sell-product">
            <h2>Bán sản phẩm</h2>
            <form action="" method="POST">
                <input type="text" id="sell-productId" name="sell-productId" placeholder="Mã sản phẩm">
                <input type="number" id="product-quantity" name="product-quantity" placeholder="Số lượng">
                <button type="submit" class="sell">Bán</button>
            </form>
        </div>
        <div class="list-product">
            <h2>Danh sách sản phẩm</h2>
            <table>
                <thead> 
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Giá</th>
                        <th>Tồn kho</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <hr>
                    <p style="color: <?= strpos($message, 'Lỗi') !== false ? 'red' : 'green'; ?>;">
        <?= htmlspecialchars($message) ?>
    </p>
    <?php 
        if ($product_list) ?>
            <tr>
                <td><?= htmlspecialchars($product_list->getId()) ?></td>
                <td><?= htmlspecialchars($product_list->getName()) ?></td>
                <td><?= htmlspecialchars($product_list->getBrand()) ?></td>
                <td><?= htmlspecialchars($product_list->getPrice()) ?></td>
                <td><?= htmlspecialchars($product_list->getTotal_quantity()) ?></td>
                <td><?= htmlspecialchars($product_list->getStatus()) ?></td>
            </tr>
        
    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>