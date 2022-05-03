<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CateringFiltersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CateringFiltersTable Test Case
 */
class CateringFiltersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CateringFiltersTable
     */
    protected $CateringFilters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CateringFilters',
        'app.Offers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CateringFilters') ? [] : ['className' => CateringFiltersTable::class];
        $this->CateringFilters = $this->getTableLocator()->get('CateringFilters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CateringFilters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CateringFiltersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CateringFiltersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
