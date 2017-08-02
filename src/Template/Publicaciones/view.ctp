<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Publicacione $publicacione
  */
?>
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="navbar-brand"><?= __('Acciones') ?></li>
        <?php if($user['users_perfile']['id'] == 1 ):?>
        <li><?= $this->Html->link(__('Editar Publicaciones'), ['action' => 'edit', $publicacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Publicaciones'), ['action' => 'delete', $publicacione->id], ['confirm' => __('Esta seguro que desea eliminar # {0}?', $publicacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('Nueva Publicacion'), ['action' => 'add']) ?> </li>
        <?php endif; ?>    
        <li><?= $this->Html->link(__('Listar Publicaciones'), ['action' => 'index']) ?> </li>
        <!--li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li-->
    </ul>
</nav>
<div class="publicaciones view large-9 medium-8 columns content">


    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?= h($publicacione->titulo) ?></h3><span class="label label-primary"><?= h($publicacione->created) ?></span>
        </div>
        <div class="panel-body">
            <div class="list-group">
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Autor') ?></h4>
                <p class="list-group-item-text"><?= h($publicacione->autor) ?></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Detalle') ?></h4>
                <p class="list-group-item-text"><?= h($publicacione->resumen) ?></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?= __('Texto') ?></h4>
                <p class="list-group-item-text"><?= $this->Text->autoParagraph(h($publicacione->texto_completo)); ?></p>
              </a>
            </div>
            <nav aria-label="...">
              <ul class="pager">
                <li class="previous <?=($id_menor==null)?'disabled':'';?>"><?= $this->Html->link(__('Publicacion Anterior'), ['controller' => 'Publicaciones', 'action' => 'view',$id_menor]) ?></li>
                <li class="next <?=($id_mayor==null)?'disabled':'';?>"><?= $this->Html->link(__('Publicacion Siguiente'), ['controller' => 'Publicaciones', 'action' => 'view',$id_mayor]) ?></li>
              </ul>
            </nav>
        </div>
    </div>
</div>
