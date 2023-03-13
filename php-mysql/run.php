<?php

require_once 'connect.php';
require_once 'functions.php';

// update('users', [
//     'name' => 'An 2',
//     'email' => 'an2@gmail.com',
//     'updated_at' => date('Y-m-d H:i:s')
// ], "id=13");

// delete('users', "id=:id", ['id' => 7]);

// create('user1', [
//     'name' => 'An',
//     'email' => 'an@example.com',
// ]);

// $users = get('SELECT * FROM users WHERE email=:email', ['email' => 'nguyenvana@gmail.com']);

// echo '<pre>';
// print_r($users);
// echo '</pre>';

$user = first("SELECT * FROM users1 WHERE id=?", [7]);
echo '<pre>';
print_r($user);
echo '</pre>';
