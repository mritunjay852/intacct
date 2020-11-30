<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <h1> Report page </h1>
    <form action="/report/fetchreport" method="post">
        <input type="date" name="createtime" id="createtime">
        <input type="submit" name="report" value="Submit">
    </form>
    <?php //print_r($data);
            foreach($data as $rs){ ?>
            <div>
                <p>Email: <?=$rs['email']?></p><p>Product Name:<?=$rs['product_name']?></p>
                <p>Unit Qty:<?=$rs['unit_qty']?></p> <p>Box Qty:<?=$rs['box_qty']?></p>
                <p>Total Coins:<?=$rs['total_price']?></p>
                <p>======================================================================================</p>
            </div>
    <?php   } ?>
</body>
</html>