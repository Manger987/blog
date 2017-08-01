<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Publicacione $publicacione
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Publicacione'), ['action' => 'edit', $publicacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publicacione'), ['action' => 'delete', $publicacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Publicaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publicacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="publicaciones view large-9 medium-8 columns content">
    <h3><?= h($publicacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $publicacione->has('user') ? $this->Html->link($publicacione->user->id, ['controller' => 'Users', 'action' => 'view', $publicacione->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($publicacione->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autor') ?></th>
            <td><?= h($publicacione->autor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($publicacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($publicacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($publicacione->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Resumen') ?></h4>
        <?= $this->Text->autoParagraph(h($publicacione->resumen)); ?>
    </div>
    <div class="row">
        <h4><?= __('Texto Completo') ?></h4>
        <?= $this->Text->autoParagraph(h($publicacione->texto_completo)); ?>
    </div>
</div>
