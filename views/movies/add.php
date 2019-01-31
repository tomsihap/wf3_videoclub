<?php ob_start(); ?>
    
    <h1>Ajout d'un film</h1>

    <form action="save" method="POST">

        <input type="text" name="title" placeholder="Titre">

        <input type="date" name="release_date">

        <input type="text" name="plot" placeholder="Intrigue">

        <select name="category_id">
        <?php foreach($cats as $c) : ?>

            <option value="<?= $c['id']; ?>" title="<?= $c['description'] ?>" ><?= $c['title']; ?></option>

        <?php endforeach; ?>

        </select>

        <button type="submit">Envoyer</button>
    
    </form>
    
<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php' ?>