<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SavedUserOffersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SavedUserOffersTable Test Case
 */
class SavedUserOffersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SavedUserOffersTable
     */
    protected $SavedUserOffers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SavedUserOffers',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('SavedUserOffers') ? [] : ['className' => SavedUserOffersTable::class];
        $this->SavedUserOffers = $this->getTableLocator()->get('SavedUserOffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SavedUserOffers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SavedUserOffersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SavedUserOffersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
