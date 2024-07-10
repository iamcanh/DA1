<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet nguoi dung: <?= $user['username'] ?></title>
</head>
<body>
    <h1>Chi tiet nguoi dung: <?= $user['username'] ?></h1>
    <table>
        <tr>
            <th>Ten truong</th>
            <th>Gia tri</th>
        </tr>
        <tr>
            <td>Name</td>
            <td><?= $user['username'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $user['email'] ?></td>
        </tr>
    </table>
</body>
</html>