<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Buy, initial-scale=1.0">
    <title>Purchase</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <h1>Purchase</h1>
    <?php //print_r($data); ?>
    <p><?=$data['product'][0]['product_name']?></p> <p><?=$data['product'][0]['price']?></p>
    <form action="/product/buynow" method="post">
        <input type="hidden" name="product_id" value="<?=$data['product'][0]['product_id']?>">
        <input type="hidden" name="price" value="<?=$data['product'][0]['price']?>">
        <select name="user_id" required>
            <option value="">Choose User</option>
        <?php foreach($data['users'] as $rs){ ?>
            <option value="<?=$rs['user_id']?>"><?=$rs['email']?></option>
    <?php } ?>
        </select>
        <input type="number" name="qty" id="qty" value="1">
        <input type="submit" name="buyNow" value="Buy Now">
    </form>
</body>
</html>