<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProgramApplicationsFixture
 */
class ProgramApplicationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'application_outcome_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'application_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'program_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'university_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_of_application' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'program_key' => ['type' => 'index', 'columns' => ['program_id'], 'length' => []],
            'user_key' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'application_status_key' => ['type' => 'index', 'columns' => ['application_status_id'], 'length' => []],
            'university_key' => ['type' => 'index', 'columns' => ['university_id'], 'length' => []],
            'application_outcome_key' => ['type' => 'index', 'columns' => ['application_outcome_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'program_applications_ibfk_1' => ['type' => 'foreign', 'columns' => ['program_id'], 'references' => ['programs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'program_applications_ibfk_2' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'program_applications_ibfk_3' => ['type' => 'foreign', 'columns' => ['application_status_id'], 'references' => ['application_status', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'program_applications_ibfk_4' => ['type' => 'foreign', 'columns' => ['university_id'], 'references' => ['universities', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'program_applications_ibfk_5' => ['type' => 'foreign', 'columns' => ['application_outcome_id'], 'references' => ['application_outcomes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'application_outcome_id' => 1,
                'application_status_id' => 1,
                'program_id' => 1,
                'university_id' => 1,
                'date_of_application' => '2019-09-12 14:24:42'
            ],
        ];
        parent::init();
    }
}
