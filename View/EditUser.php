<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <?php require_once 'Header.php' ?>
    <?php require_once 'Message.php' ?>
    <h1> Edit User page </h1>
    <form action="/user/editpost" method="post">
        <input disabled type="text" name="name" id="name" value="<?=$data[0]['name']?>" placeholder="Enter Name">
        <input disabled type="email" name="email" id="email" value="<?=$data[0]['email']?>" placeholder="Enter Email">
        <input type="number" name="coins" id="coins" value="<?=$data[0]['coins']?>" placeholder="Enter Coins">
        <input type="hidden" name="id" value="<?=$data[0]['user_id']?>">
        <input type="submit" name="updateUser" value="Update User">
    </form>
</body>
</html>