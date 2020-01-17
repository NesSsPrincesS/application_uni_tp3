<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\University[]|\Cake\Collection\CollectionInterface $universities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?></li>
        <li><a ng-click="addUniversity()"><?= __('New University') ?></a></li>
        <li><?= $this->Html->link(__('List Program Applications'), ['controller' => 'ProgramApplications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Program Application'), ['controller' => 'ProgramApplications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="universities index large-9 medium-8 columns content">
    <h3><?= __('Universities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('web_site') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($universities as $university): ?>
            <tr>
                <td><?= h($university->name) ?></td>
                <td><?= h($university->adress) ?></td>
                <td><?= h($university->web_site) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $university->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $university->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $university->id], ['confirm' => __('Are you sure you want to delete # {0}?', $university->id)]) ?>
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
