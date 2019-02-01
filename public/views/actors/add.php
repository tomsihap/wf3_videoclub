<?php ob_start(); ?>

    <h1>Ajout d'un acteur</h1>

    <form action="save" method="POST">
        
        <input type="text" name="lastname" placeholder="Prénom">
        <input type="text" name="firstname" placeholder="Nom">

        <button type="submit">Créer l'acteur</button>
    
    </form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>
