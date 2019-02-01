<?php ob_start(); ?>

    Liste de mes categories :

    <ul>
        
        <?php foreach ($listCats as $c) : ?>

            <li><a href="categories/<?= $c['id'] ?>"><?= $c['title']; ?></a></li>

        <?php endforeach; ?>

    </ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>
