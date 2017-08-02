<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="navbar-brand"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Publicaciones'), ['action' => 'index']) ?></li>
        <!--li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li-->
    </ul>
</nav>
<div class="publicaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($publicacione) ?>
    <fieldset>
        <legend><?= __('Agregar Publicacion') ?></legend>
        <?php
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('resumen');
            echo $this->Form->control('texto_completo');
            echo $this->Form->control('autor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
