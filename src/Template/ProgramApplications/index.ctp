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
<div class="programApplications index large-9 medium-8 columns content">
    <h3><?= __('Program Applications') ?></h3>

    <div>

        <?php
            //TODO: make sure you don't need this (error in console: file not found)
            //            $urlToCarsAutocompletedemoJson = $this->Url->build([
            //                "controller" => "ProgramApplications",
            //                "action" => "findProgramApplications",
            //                "_ext" => "json"
            //            ]);
            //        echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
            //        echo $this->Html->script('ProgramApplications/autocompletedemo', ['block' => 'scriptBottom']);
        ?>
    </div>

    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('application_outcome_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('application_status_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('program_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('university_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($programApplications as $programApplication): ?>
            <tr>
                <td><?= $programApplication->has('user_id') ? $this->Html->link($programApplication->user->name, ['controller' => 'Users', 'action' => 'view', $programApplication->user->id]) : '' ?></td>
                <td><?= $programApplication->has('application_outcome_id') ? $this->Html->link($programApplication->application_outcome->outcome, ['controller' => 'ApplicationOutcomes', 'action' => 'view', $programApplication->application_outcome->id]) : '' ?></td>
                <td><?= $programApplication->has('application_status_id') ? $this->Html->link($programApplication->application_status->status, ['controller' => 'ApplicationStatus', 'action' => 'view', $programApplication->application_status->id]) : '' ?></td>
                <td><?= $programApplication->has('program_id') ? $this->Html->link($programApplication->program->name, ['controller' => 'Programs', 'action' => 'view', $programApplication->program->id]) : '' ?></td>
                <td><?= $programApplication->has('university_id') ? $this->Html->link($programApplication->university->name, ['controller' => 'Universities', 'action' => 'view', $programApplication->university->id]) : '' ?></td>
                <td><?= h($programApplication->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $programApplication->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $programApplication->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $programApplication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programApplication->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <div ng-app="app" ng-controller="ProgramApplicationsCRUDCtrl">
            <br/> <br/>
            <a href="#" ng-click="getApplication(2)">Get Application</a>


            <a ng-click="updateApplication(programApplication.id, programApplication.application_outcome_id, programApplication.application_status_id)">Update
                Application</a>
            <a ng-click="addApplication(application.name, application.description)">Add Application</a>
            <a ng-click="deleteApplication(application.id)">Delete Application</a>

            <br/> <br/>
            <p style="color: green">{{message}}</p>
            <p style="color: red">{{errorMessage}}</p>

            <br/>
            <br/>
            <a ng-click="getAllApplications()">Get all Applications</a><br/>
            <br/> <br/>
            <!--            application here can't be called smth like programApplication because it's an actual variable name in index.js-->
<!--            the parameters must be as they appear in the database -->
<!--            need to create custom api endpoint to get the fucking names from the id fucking christ-->
            <div ng-repeat="application in programApplications">
                {{application.id}} {{application.user_id}} {{application.application_outcome_id}}
                {{application.application_status_id}} {{application.program_id}} {{application.university_id}}
                {{application.created}}
            </div>
            <pre ng-show='programApplications'>{{programApplications}}</pre>
<!--            maybe need a hidden input to submit id as well?-->
            <table>
                <tr>
                    <td width="100">University:</td>
                    <td><input type="text" id="id" ng-model="programApplication.id"/></td>
                </tr>
                <tr>
                    <td width="100">Faculties:</td>
                    <td><input type="text" id="name" ng-model="programApplication.name"/></td>
                </tr>
                <tr>
                    <td width="100">Programs:</td>
                    <td><input type="text" id="description" ng-model="programApplication.description"/></td>
                </tr>
            </table>
        </div>
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



