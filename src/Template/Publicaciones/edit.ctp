<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="navbar-brand"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $publicacione->id],
                ['confirm' => __('Estas seguro que deseas eliminar # {0}?', $publicacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Publicaciones'), ['action' => 'index']) ?></li>
        <!--li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li-->
    </ul>
</nav>
<div class="publicaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($publicacione) ?>
    <fieldset>
        <legend><?= __('Edit Publicacione') ?></legend>
        <?php
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->hidden('user_id',['value' => $this->request->session()->read('Auth.User.id')]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('resumen');
            echo $this->Form->control('texto_completo');
            echo $this->Form->control('autor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar'),['class'=>'btn btn-success btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
