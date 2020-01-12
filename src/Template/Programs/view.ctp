<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Program'), ['action' => 'edit', $program->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Programs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Applications'), ['controller' => 'ProgramApplications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Application'), ['controller' => 'ProgramApplications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="programs view large-9 medium-8 columns content">
    <h2><?= h($program->name) ?></h2>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($program->Description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Program Applications') ?></h4>
        <?php if (!empty($program->program_applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User name') ?></th>
                <th scope="col"><?= __('Application Outcome') ?></th>
                <th scope="col"><?= __('Application Status') ?></th>
                <th scope="col"><?= __('Program name') ?></th>
                <th scope="col"><?= __('University') ?></th>
                <th scope="col"><?= __('Date Of Application') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($program->program_applications as $programApplications): ?>
            <tr>
                <td><?= h($programApplications->user->name) ?></td>
                <td><?= h($programApplications->application_outcome->outcome) ?></td>
                <td><?= h($programApplications->application_status->status) ?></td>
                <td><?= h($program->name) ?></td>
                <td><?= h($programApplications->university->name) ?></td>
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
