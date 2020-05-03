<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Liste des membres',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Modifier votre profil',['action' => 'edit']) ?></p>
        <p><?= $this->Html->link('>Déconnexion',['action' => 'logout']) ?></p>
    </ul>
</nav>

<h1><?= $user->pseudo ?></h1>
<p>Membre depuis : <?= $user->created->i18nFormat('dd/MM/yyyy') ?></p>

<!--l'utilisateur a t'il un avatar ?
-->

<?php if(!empty($user->avatar)){ ?>

    <figure>
        <?= $this->Html->image('avatars/'.$user->avatar, ['alt' => 'Avatar de '.$user->pseudo]) ?>
    </figure>

<?php }else {?>

    <figure>
        <?= $this->Html->image('default.png', ['alt' => 'Avatar par défaut']) ?>
    </figure>

<?php }?>


<h2>ses messages</h2>
<p>...</p>
