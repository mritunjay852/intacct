<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <?php require_once 'Message.php' ?>
    <h1>Home Page</h1>
    <form action="/product/buynow" method="post">
        <select onchange="fetchPrice(this)" name="product_id" required>
                <option value="">Choose Product</option>
            <?php foreach($data['products'] as $rs){ ?>
                <option price="<?=$rs['price']?>" value="<?=$rs['product_id']?>"><p><?=$rs['product_name']?>  <?=$rs['price']?></p></option>
        <?php } ?>
        </select>
        <select name="user_id" required>
                <option value="">Choose User</option>
            <?php foreach($data['users'] as $rs){ ?>
                <option value="<?=$rs['user_id']?>"><?=$rs['email']?></option>
        <?php } ?>
        </select>
        <input type="hidden" name="price" id="price"value="">
        <input type="number" name="qty" id="qty" value="1">
        <input type="hidden" name="path" id="path"value="/">
        <input type="submit" name="buyNow" value="Buy Now">
    </form>
    <script>
        function fetchPrice(elem){
            var price = elem.options[elem.selectedIndex].getAttribute('price');
            document.getElementById('price').value = price;
        }
    </script>
</body>
</html>