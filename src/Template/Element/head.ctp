<?php
    echo $this->Html->charset();
    echo $this->Html->css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'base.css',
        'style.css'
    ]);
    echo $this->Html->script([
        'https://code.jquery.com/jquery-1.12.4.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js'
    ], ['block' => 'scriptLibraries']
    );
?>
<title><?= __('Program application') ?></title>
