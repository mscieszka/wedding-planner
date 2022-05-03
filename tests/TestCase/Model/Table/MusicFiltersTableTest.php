<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusicFiltersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusicFiltersTable Test Case
 */
class MusicFiltersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MusicFiltersTable
     */
    protected $MusicFilters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MusicFilters',
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
        $config = $this->getTableLocator()->exists('MusicFilters') ? [] : ['className' => MusicFiltersTable::class];
        $this->MusicFilters = $this->getTableLocator()->get('MusicFilters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MusicFilters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MusicFiltersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MusicFiltersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
