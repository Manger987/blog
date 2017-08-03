<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="navbar-brand"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Usuario'), ['action' => 'delete', $user->id], ['confirm' => __('Esta seguro de eliminar el usuario # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('listar usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('Informacion de usuario') ?></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Email') ?></h4>
                <p class="list-group-item-text"><?= h($user->email) ?></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Contraseña') ?></h4>
                <p class="list-group-item-text"><?= h($user->password) ?></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Fecha agregado al sistema') ?></h4>
                <p class="list-group-item-text"><?= h($user->created) ?></p>
              </a>
            </div>
            <nav aria-label="...">
              <ul class="pager">
                <li class="previous <?=($id_menor==null)?'disabled':'';?>"><?= $this->Html->link(__('Usuario Anterior'), ['controller' => 'Users', 'action' => 'view',$id_menor]) ?></li>
                <li class="next <?=($id_mayor==null)?'disabled':'';?>"><?= $this->Html->link(__('Usuario Siguiente'), ['controller' => 'Users', 'action' => 'view',$id_mayor]) ?></li>
              </ul>
            </nav>
        </div>
    </div>
