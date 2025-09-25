<?php

namespace App\Classes\Compare\Obj; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Users;
use App\Cat;


$user1 = new Users();
$user1->id = 1;
$user1->name = 'Petr';

$user2 = new Users();
$user2->id = 1;
$user2->name = 'Jack';

$user3 = new Users();
$user3->id = 3;

$user4 = new Users();
$user3->id = true;

$cat1 = new Cat();
$cat1->id = 1;

function areUsersEqual(Users $user1, Users $user2)
{
    if (get_class($user1) === get_class($user2) && is_int($user1->id) && is_int($user2->id)) {
        return $user1->id === $user2->id;
    } else {
        return false;
    }
}
areUsersEqual($user1, $user2);


//tutor's
//function areUsersEqual(User $user1, User $user2)
// {
//     $hasSameIds = $user1->id === $user2->id;
//     return $hasSameIds;
// }