<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <?php require_once 'Message.php' ?>
    <h1> Edit Product </h1>
    <form action="/product/editpost" method="post">
        <input  type="text" name="product_name" id="product_name" value="<?=$data[0]['product_name']?>">
        <input  type="text" name="qty" id="qty" value="<?=$data[0]['qty']?>">
        <input type="number" name="price" id="price" value="<?=$data[0]['price']?>">
        <input type="hidden" name="product_id" value="<?=$data[0]['product_id']?>">
        <input type="submit" name="updateUser" value="Update Product">
    </form>
</body>
</html>