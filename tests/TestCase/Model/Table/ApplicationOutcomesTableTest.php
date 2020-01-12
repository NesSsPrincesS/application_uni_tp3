<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationOutcomesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationOutcomesTable Test Case
 */
class ApplicationOutcomesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationOutcomesTable
     */
    public $ApplicationOutcomes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ApplicationOutcomes',
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
        $config = TableRegistry::getTableLocator()->exists('ApplicationOutcomes') ? [] : ['className' => ApplicationOutcomesTable::class];
        $this->ApplicationOutcomes = TableRegistry::getTableLocator()->get('ApplicationOutcomes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationOutcomes);

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
