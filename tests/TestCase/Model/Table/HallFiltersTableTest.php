<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HallFiltersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HallFiltersTable Test Case
 */
class HallFiltersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HallFiltersTable
     */
    protected $HallFilters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HallFilters',
        'app.Offers',
        'app.HallTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HallFilters') ? [] : ['className' => HallFiltersTable::class];
        $this->HallFilters = $this->getTableLocator()->get('HallFilters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HallFilters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HallFiltersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HallFiltersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
