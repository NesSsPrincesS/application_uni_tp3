<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Faculties",
    "action" => "getFaculties",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('ProgramApplications/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProgramApplication $programApplication
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $programApplication->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $programApplication->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Program Applications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Application Outcomes'), ['controller' => 'ApplicationOutcomes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application Outcome'), ['controller' => 'ApplicationOutcomes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Application Status'), ['controller' => 'ApplicationStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application Status'), ['controller' => 'ApplicationStatus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['controller' => 'Universities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New University'), ['controller' => 'Universities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programApplications form large-9 medium-8 columns content">
    <?= $this->Form->create($programApplication) ?>
    <fieldset>
        <legend><?= __('Edit Program Application') ?></legend>
        <?php
            echo $this->Form->control('application_outcome_id', ['options' => $applicationOutcomes]);
            echo $this->Form->control('application_status_id', ['options' => $applicationStatus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
