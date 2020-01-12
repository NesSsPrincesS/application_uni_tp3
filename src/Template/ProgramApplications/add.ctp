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
 * @var \App\Model\Entity\Article $article
 */
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
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['controller' => 'Universities', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="programApplications form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="FacultiesController">
    <?= $this->Form->create($programApplication) ?>
    <fieldset>
        <legend><?= __('Add Program Application') ?></legend>
        <?php
        echo $this->Form->control('university_id', ['options' => $universities]);
        ?>
        <div>
            Faculties: 
            <select name="Faculty_id"
                    id="faculty-id" 
                    ng-model="faculty" 
                    ng-options="faculty.name for faculty in faculties track by faculty.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Programs: 
            <select name="program_id"
                    id="program-id" 
                    ng-disabled="!faculty" 
                    ng-model="program"
                    ng-options="program.name for program in faculty.programs track by program.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
