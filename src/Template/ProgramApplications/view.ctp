<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProgramApplication $programApplication
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Program Application'), ['action' => 'edit', $programApplication->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program Application'), ['action' => 'delete', $programApplication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programApplication->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Program Applications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Application'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Application Outcomes'), ['controller' => 'ApplicationOutcomes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application Outcome'), ['controller' => 'ApplicationOutcomes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Application Status'), ['controller' => 'ApplicationStatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application Status'), ['controller' => 'ApplicationStatus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Universities'), ['controller' => 'Universities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['controller' => 'Universities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $(function(){
          $("#tags").autocomplete({
            source: 
          });
  } );
  </script>
<div class="programApplications view large-9 medium-8 columns content">
    <h3>Application <?= h($programApplication->id) ?> </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application number') ?></th>
            <td><?= $this->Number->format($programApplication->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $programApplication->has('user') ? $this->Html->link($programApplication->user->name, ['controller' => 'Users', 'action' => 'view', $programApplication->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application Outcome') ?></th>
            <td><?= $programApplication->has('application_outcome') ? $this->Html->link($programApplication->application_outcome->outcome, ['controller' => 'ApplicationOutcomes', 'action' => 'view', $programApplication->application_outcome->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application Status') ?></th>
            <td><?= $programApplication->has('application_status') ? $this->Html->link($programApplication->application_status->status, ['controller' => 'ApplicationStatus', 'action' => 'view', $programApplication->application_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Faculty') ?></th>
            <td><?= $programApplication->has('faculty') ? $this->Html->link($programApplication->faculty->name, ['controller' => 'Faculties', 'action' => 'view', $programApplication->faculty->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Program') ?></th>
            <td><?= $programApplication->has('program') ? $this->Html->link($programApplication->program->name, ['controller' => 'Programs', 'action' => 'view', $programApplication->program->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('University') ?></th>
            <td><?= $programApplication->has('university') ? $this->Html->link($programApplication->university->name, ['controller' => 'Universities', 'action' => 'view', $programApplication->university->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Application') ?></th>
            <td><?= h($programApplication->created) ?></td>
        </tr>
    </table>
</div>
