<?php ob_start(); ?>

    <h1>Ajout d'une categorie</h1>

    <form action="save" method="POST">
        
        <input type="text" name="title" placeholder="titre de la cat">
        <input type="text" name="description" placeholder="desc de la cat">

        <button type="submit">Créer la categorie</button>
    
    </form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>
