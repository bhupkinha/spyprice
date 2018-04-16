<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feature $feature
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feature'), ['action' => 'edit', $feature->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feature'), ['action' => 'delete', $feature->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feature->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Features'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feature'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="features view large-9 medium-8 columns content">
    <h3><?= h($feature->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($feature->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feature->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($feature->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($feature->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($feature->modified) ?></td>
        </tr>
    </table>
</div>
