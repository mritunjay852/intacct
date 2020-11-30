<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <?php require_once 'Message.php' ?>
    <h1> Product Add </h1>
    <form action="/product/addpost" method="post">
        <input type="text" name="product_name" id="product_name" placeholder="Enter Product Name">
        <input type="text" name="qty" id="qty" placeholder="Enter Quantity">
        <input type="number" name="price" id="price" placeholder="Enter Price">
        <input type="submit" name="addUser" value="Add Product">
    </form>
    <?php //print_r($data);
            foreach($data as $rs){ ?>
            <div>
                <p><?=$rs['product_name']?></p><p><?=$rs['qty']?></p><p><?=$rs['price']?></p> 
                <a href="/product/edit&product_id=<?=$rs['product_id']?>">Edit</a>
                <a href="/product/purchase&product_id=<?=$rs['product_id']?>">Purchase</a>
            </div>
    <?php   }
    ?>
</body>
</html>