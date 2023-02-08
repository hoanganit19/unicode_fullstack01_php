<?php
$users = [
    [
        'name' => 'Nguyễn Văn A',
        'email' => 'nguyenvana@gmail.com',
    ],
    [
        'name' => 'Nguyễn Văn B',
        'email' => 'nguyenvanb@gmail.com',
    ],
    [
        'name' => 'Nguyễn Văn C',
        'email' => 'nguyenvanc@gmail.com',
    ],
    [
        'name' => 'Nguyễn Văn B',
        'email' => 'nguyenvanb@gmail.com',
    ],
    [
        'name' => 'Nguyễn Văn B',
        'email' => 'nguyenvanb@gmail.com',
    ],
    [
        'name' => 'Nguyễn Văn B',
        'email' => 'nguyenvanb@gmail.com',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($users)):
                $emails = [];
                foreach ($users as $user):
                    if (!in_array($user['email'], $emails)):
                        $emails[] = $user['email'];
                        ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <?php
                    endif;
                endforeach;
            endif;
?>
        </tbody>
    </table>
</body>

</html>