<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feature[]|\Cake\Collection\CollectionInterface $features
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Feature'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="features index large-9 medium-8 columns content">
    <h3><?= __('Features') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($features as $feature): ?>
            <tr>
                <td><?= $this->Number->format($feature->id) ?></td>
                <td><?= h($feature->name) ?></td>
                <td><?= $this->Number->format($feature->status) ?></td>
                <td><?= h($feature->created) ?></td>
                <td><?= h($feature->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $feature->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feature->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feature->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feature->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
