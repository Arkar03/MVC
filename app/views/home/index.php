<h1>Home Page</h1>

<ul>
    <?php foreach ($data as $user) : ?>
        <li><?= $user->name ?></li>
    <?php endforeach ?>
</ul>