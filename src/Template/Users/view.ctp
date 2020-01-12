<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Applications'), ['controller' => 'ProgramApplications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Application'), ['controller' => 'ProgramApplications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Num') ?></th>
            <td><?= $this->Number->format($user->phone_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($user->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Registration') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Program Applications') ?></h4>
        <?php if (!empty($user->program_applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Application Status') ?></th>
                <th scope="col"><?= __('Program') ?></th>
                <th scope="col"><?= __('University') ?></th>
                <th scope="col"><?= __('Date Of Application') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->program_applications as $programApplications): ?>
            <tr>
                <td><?= h($programApplications->application_outcome->outcome) ?> </td>
                <td><?= h($programApplications->application_status->status) ?></td>
                <td><?= h($programApplications->program->name) ?></td>
                <td><?= h($programApplications->university->name) ?></td>
                <td><?= h($programApplications->created) ?></td>
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
