<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HallTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HallTypesTable Test Case
 */
class HallTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HallTypesTable
     */
    protected $HallTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HallTypes',
        'app.HallFilters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HallTypes') ? [] : ['className' => HallTypesTable::class];
        $this->HallTypes = $this->getTableLocator()->get('HallTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HallTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HallTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HallTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
