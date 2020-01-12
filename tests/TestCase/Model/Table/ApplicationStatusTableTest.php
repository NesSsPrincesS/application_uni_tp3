<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationStatusTable Test Case
 */
class ApplicationStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationStatusTable
     */
    public $ApplicationStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ApplicationStatus',
        'app.ProgramApplications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ApplicationStatus') ? [] : ['className' => ApplicationStatusTable::class];
        $this->ApplicationStatus = TableRegistry::getTableLocator()->get('ApplicationStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationStatus);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
