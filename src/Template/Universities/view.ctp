<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\University $university
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit University'), ['action' => 'edit', $university->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete University'), ['action' => 'delete', $university->id], ['confirm' => __('Are you sure you want to delete # {0}?', $university->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Applications'), ['controller' => 'ProgramApplications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Application'), ['controller' => 'ProgramApplications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="universities view large-9 medium-8 columns content">
    <h3><?= h($university->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($university->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($university->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Web Site') ?></th>
            <td><?= h($university->web_site) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Program Applications') ?></h4>
        <?php if (!empty($university->program_applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Application Outcome') ?></th>
                <th scope="col"><?= __('Application Status') ?></th>
                <th scope="col"><?= __('Program') ?></th>
                <th scope="col"><?= __('University') ?></th>
                <th scope="col"><?= __('Date Of Application') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($university->program_applications as $programApplications): ?>
            <tr>
                <td><?= h($programApplications->user->name) ?></td>
                <td><?= h($programApplications->application_outcome->outcome) ?></td>
                <td><?= h($programApplications->application_status->status) ?></td>
                <td><?= h($programApplications->program->name) ?></td>
                <td><?= h($university->name) ?></td>
                <td><?= h($programApplications->date_of_application) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProgramApplications', 'action' => 'view', $programApplications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProgramApplications', 'action' => 'edit', $programApplications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProgramApplications', 'action' => 'delete', $programApplications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programApplications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
