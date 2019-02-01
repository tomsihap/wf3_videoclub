<?php ob_start(); ?>

    Liste de mes films :

    <ul>
        <?php foreach ($movies as $m) : ?>
            <li>
                <a href="movies/<?= $m['id'] ?>"><?= $m['title'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>