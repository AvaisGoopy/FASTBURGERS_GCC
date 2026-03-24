<?php
// This view displays a list of users.
?>
<h1>Users</h1>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user ?></li>
<?php endforeach; ?>
</ul>