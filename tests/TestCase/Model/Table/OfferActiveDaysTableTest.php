<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfferActiveDaysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfferActiveDaysTable Test Case
 */
class OfferActiveDaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OfferActiveDaysTable
     */
    protected $OfferActiveDays;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OfferActiveDays',
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
        $config = $this->getTableLocator()->exists('OfferActiveDays') ? [] : ['className' => OfferActiveDaysTable::class];
        $this->OfferActiveDays = $this->getTableLocator()->get('OfferActiveDays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OfferActiveDays);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OfferActiveDaysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OfferActiveDaysTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
