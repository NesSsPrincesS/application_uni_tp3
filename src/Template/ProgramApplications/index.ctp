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

    <div ng-app="app" ng-controller="ProgramApplicationsCRUDCtrl">
        <a ng-click="getAllApplications()">Get all Applications</a><br/>
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
                    <a ng-click="getApplication(programApplication.id)">View</a>
                    <a ng-click="updateApplication(programApplication.id, programApplication.application_outcome_id, programApplication.application_status_id)">Edit</a>
                    <a ng-click="deleteApplication(programApplication.id)">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

<!--    <div ng-app="app" ng-controller="ProgramApplicationsCRUDCtrl">-->
<!--        <a ng-click="updateApplication(programApplication.id, programApplication.application_outcome_id, programApplication.application_status_id)">Update-->
<!--            Application</a>-->
<!--        <a ng-click="addApplication(programApplication.id, programApplication.university_id, programApplication.program_id)">Add-->
<!--            Application</a>-->
<!--        <a ng-click="deleteApplication(programApplication.id)">Delete Application</a>-->
<!---->
<!--        <p style="color: green">{{message}}</p>-->
<!--        <p style="color: red">{{errorMessage}}</p>-->
<!---->
<!--        <a ng-click="getAllApplications()">Get all Applications</a><br/>-->
        <!--            application here can't be called smth like programApplication because it's an actual variable name in index.js-->
        <!--            the parameters must be as they appear in the database -->
        <!--            need to create custom api endpoint to get the fucking names from the id fucking christ-->
<!--        <tbody>-->
<!---->
<!--        </tbody>-->

<!--        <pre ng-show='programApplications'>{{programApplications}}</pre>-->
        <!--            maybe need a hidden input to submit id as well?-->
<!--        <table>-->
    <!--            <tr>-->
    <!--                <td width="100">ID:</td>-->
    <!--                <td><input type="text" id="id" ng-model="programApplication.id"/></td>-->
    <!--            </tr>-->
    <!--            <tr>-->
    <!--                <td width="100">University:</td>-->
    <!--                <td><input type="text" id="university-id" ng-model="programApplication.university_id"/></td>-->
    <!--            </tr>-->
    <!--            <tr>-->
    <!--                <td width="100">Faculties:</td>-->
    <!--                <td><input type="text" id="faculty-id" ng-model="programApplication.faculty_id"/></td>-->
    <!--            </tr>-->
    <!--            <tr>-->
    <!--                <td width="100">Programs:</td>-->
    <!--                <td><input type="text" id="program-id" ng-model="programApplication.program_id"/></td>-->
    <!--            </tr>-->
    <!---->
    <!--        </table>-->
    <!--    </div>-->
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






