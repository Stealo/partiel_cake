<?php //src/Template/Quotes/hello.ctp ?>


<h1>Liste des citations</h1>

<?php if ($list->count() == 0)
    echo '<p>Désolé, il n\'y a pas de contenu</p>';
    else {
        echo '<ul>';
        foreach ($list as $key => $value) {
            echo '<li>' .
                $value->content . '' .
                $this->Html->link('voir la fiche', ['action' => 'view', $value->id]). //1er texte/lien 2eme ce qu'il doit faire
                '</li>';
        }
        echo '</ul>';
}
?>
