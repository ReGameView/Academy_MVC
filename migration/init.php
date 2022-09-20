<?php
// command: php migration/init.php
$dsh = new PDO('mysql:host=db;dbname=app_db;charset=utf8;', 'db_user', 'db_user_pass');

$ch = curl_init('https://randomuser.me/api/');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => 1,
]);

for($i = 0; $i < 100; $i++) {
    $response = json_decode(curl_exec($ch), true)['results'][0];
    $prepare = $dsh->prepare('
    INSERT INTO `students`
    (`full_name`, `groups_id`, `bithday`) 
    VALUES (:full_name, :groups_id, :birthday)
    ');

    $prepare->execute([
        'full_name' => $response['name']['title'] . ' ' . $response['name']['first'] . ' ' . $response['name']['last'],
        'groups_id' => rand(1, 3),
        'birthday' => substr($response['dob']['date'], 0, 10),
    ]);
    echo $i . "\n";
}
