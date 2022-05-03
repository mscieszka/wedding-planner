<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvincesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvincesTable Test Case
 */
class ProvincesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvincesTable
     */
    protected $Provinces;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Provinces',
        'app.Addresses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Provinces') ? [] : ['className' => ProvincesTable::class];
        $this->Provinces = $this->getTableLocator()->get('Provinces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Provinces);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProvincesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProvincesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
