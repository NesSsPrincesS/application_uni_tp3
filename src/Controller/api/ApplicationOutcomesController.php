<?php

    namespace App\Controller\Api;

    use App\Controller\Api\AppController;

    class ApplicationOutcomesController extends AppController
    {
        public $paginate = [
            'page' => 1,
            'limit' => 100,
            'maxLimit' => 150,
            'sortWhitelist' => [
                'id', 'status'
            ]
        ];
    }
