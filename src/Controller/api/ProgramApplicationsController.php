<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class ProgramApplicationsController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150
        ,
        'fields' => [
            'id', 'user_id', 'application_outcome_id', 'application_status_id', 'program_id', 'university_id', 'created'
        ]
        
//        'sortWhitelist' => [
//            'id', 'name', 'description'
//        ]
    ];

}
