<?php
/**
 * @var array $users
 */
?>

<?php
    foreach ($users as $user):
?>
    <h1>Имя: <?= $user['name'] . $user['sur_name'] ?></h1>

<?php
  endforeach;
?>
