<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountTypesTable Test Case
 */
class AccountTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountTypesTable
     */
    protected $AccountTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AccountTypes',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountTypes') ? [] : ['className' => AccountTypesTable::class];
        $this->AccountTypes = $this->getTableLocator()->get('AccountTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AccountTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AccountTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
