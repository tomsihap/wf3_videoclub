<?php ob_start(); ?>

    Liste de mes acteurs :

    <ul>
        <?php foreach ($actors as $a) : ?>
            <li><a href="actors/<?= $a['id'] ?>"><?= $a['lastname']; ?> <?= $a['firstname']; ?></a></li>
        <?php endforeach; ?>
    </ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>