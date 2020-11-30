<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <?php require_once 'Message.php' ?>
    <h1> Add User page </h1>
    <form action="/user/add" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Name">
        <input type="email" name="email" id="email" placeholder="Enter Email">
        <input type="number" name="coins" id="coins" placeholder="Enter Coins">
        <input type="submit" name="addUser" value="Add User">
    </form>
    <?php //print_r($data);
            foreach($data as $rs){ ?>
            <div>
                <p>Name: <?=$rs['name']?></p><p>Emai: <?=$rs['email']?></p><p>Coins: <?=$rs['coins']?></p> <a href="/user/edit&id=<?=$rs['user_id']?>">Edit</a>
            </div>
    <?php   }
    ?>
</body>
</html>