<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $program->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Program Applications'), ['controller' => 'ProgramApplications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Program Application'), ['controller' => 'ProgramApplications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programs form large-9 medium-8 columns content">
    <?= $this->Form->create($program) ?>
    <fieldset>
        <legend><?= __('Edit Program') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('Description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
