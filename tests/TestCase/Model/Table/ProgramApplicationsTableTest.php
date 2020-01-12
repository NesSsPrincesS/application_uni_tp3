<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgramApplicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgramApplicationsTable Test Case
 */
class ProgramApplicationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgramApplicationsTable
     */
    public $ProgramApplications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProgramApplications',
        'app.Users',
        'app.ApplicationOutcomes',
        'app.ApplicationStatus',
        'app.Programs',
        'app.Universities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProgramApplications') ? [] : ['className' => ProgramApplicationsTable::class];
        $this->ProgramApplications = TableRegistry::getTableLocator()->get('ProgramApplications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProgramApplications);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
