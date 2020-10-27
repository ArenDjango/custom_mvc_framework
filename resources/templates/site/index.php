<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo env('APP_NAME') ?></title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table, th, td{
            padding: 10px;
        }
    </style>
</head>
<body>

<h1><?php echo env('APP_NAME') ?>  </h1>
<h2><?=$query?></h2>
<table>
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
    </tr>
    <?php foreach($users as $user){ ?>
    <tr>
        <td><?=$user['title']?></td>
        <td><?=$user['name']?></td>
        <td><?=$user['lastname']?></td>
        <td><?=$user['email']?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>