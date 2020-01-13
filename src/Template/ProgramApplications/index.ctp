<?php
    //TODO: i removed 'json' from here because it wouldn't work on my pc, test with yours
    $urlToRestApi = $this->Url->build([
        'prefix' => 'api',
        'controller' => 'ProgramApplications'], true);
    echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
    echo $this->Html->script('ProgramApplications/index', ['block' => 'scriptBottom']);
?>

<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\ProgramApplication[]|\Cake\Collection\CollectionInterface $programApplications
     */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Program Application'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['controller' => 'Universities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New University'), ['controller' => 'Universities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programApplications index large-9 medium-8 columns content" ng-app="app"
     ng-controller="ProgramApplicationsCRUDCtrl">
    <div class="prog-app-index" ng-init="getAllApplications()">
        <h3><?= __('Program Applications') ?></h3>
<!--        <a ng-click="getAllApplications()">Get all Applications</a><br/>-->
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_outcome_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('program_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('university_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody ng-repeat="application in programApplications">
            <tr>
                <td>
                    {{application.id}}
                </td>
                <td>
                    {{application.user_id}}
                </td>
                <td>
                    {{application.application_outcome_id}}
                </td>
                <td>
                    {{application.application_status_id}}
                </td>
                <td>
                    {{application.program_id}}
                </td>
                <td>
                    {{application.university_id}}
                </td>
                <td>
                    {{application.created}}
                </td>
                <td class="actions">
                    <a ng-click="getApplication(application.id)"><?= __('View') ?></a>
                    <a ng-click="displayUpdateForm(application)"><?= __('Edit') ?></a>
                    <a ng-click="deleteApplication(application.id)"><?= __('Delete') ?></a>
                </td>
            </tr>
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

    <div class="prog-app-view" style="display: none">
        <h3>Application #{{application.id}}</h3>
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Application number') ?></th>
                <td>{{application.id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td>{{application.user_id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Application Outcome') ?></th>
                <td>{{application.application_outcome_id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Application Status') ?></th>
                <td>{{application.application_status_id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Faculty') ?></th>
                <td>faculty id</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Program') ?></th>
                <td>{{application.program_id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('University') ?></th>
                <td>{{application.university_id}}</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date Of Application') ?></th>
                <td>{{application.created}}</td>
            </tr>
        </table>
    </div>

    <div class="prog-app-edit" style="display: none">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Edit Program Application') ?></legend>
            <?php
                echo $this->Form->control('application_outcome_id', ['multiple' => false, 'empty' => false, 'required' => true]);
//                echo $this->Form->control('application_outcome_id', ['options' => $applicationOutcomes]);
//                echo $this->Form->control('application_status_id', ['options' => $applicationStatus]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['ng-click' => 'updateApplication(application)']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>






