<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Publicacione[]|\Cake\Collection\CollectionInterface $publicaciones
  */
?>
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="navbar-brand"><?= __('Acciones') ?></li>
        <?php if($users[0]['users_perfile']['id'] == 1): ?>
        <li><?= $this->Html->link(__('Nueva Publicacion'), ['action' => 'add']) ?></li>
        <?php endif; ?>
        <li class="pull-right"><?= $this->Html->link(__('SALIR'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <!--li><?= $this->Html->link(__('Listar Usuario'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li-->
    </ul>
</nav>
<div>
    <h3><?= __('Publicaciones') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('titulo',['Titulo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('resumen',['Detalle']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('autor',['Autor']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publicaciones as $publicacione): ?>
            <tr>
                <!--td><?= $this->Number->format($publicacione->id) ?></td>
                <td><?= $publicacione->has('user') ? $this->Html->link($publicacione->user->id, ['controller' => 'Users', 'action' => 'view', $publicacione->user->id]) : '' ?></td-->
                <td><?= h($publicacione->titulo) ?></td>
                <td><?= h($publicacione->resumen) ?></td>
                <td><?= h($publicacione->autor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $publicacione->id],['class'=>'btn btn-sm btn-success']) ?>
                    <?php if($users[0]['users_perfile']['id'] == 1): ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $publicacione->id],['class'=>'btn btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $publicacione->id],['class'=>'btn btn-sm btn-danger'], ['confirm' => __('Estas seguro de querer eliminarla? # {0}?', $publicacione->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
