<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Registered Users</h1>
    <?php
    $file = 'usuarios.json';

    if (file_exists($file)) {
        $users = json_decode(file_get_contents($file), true);

        if ($users && count($users) > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Nome</th><th>Email</th></tr>';
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                echo '<td>' . htmlspecialchars($user['nome']) . '</td>';
                echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No users registered yet.</p>';
        }
    } else {
        echo '<p>No users registered yet.</p>';
    }
    ?>
</body>
</html>
