<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingsTable Test Case
 */
class BookingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingsTable
     */
    protected $Bookings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bookings',
        'app.Users',
        'app.Offers',
        'app.Payments',
        'app.SavedUserBookings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bookings') ? [] : ['className' => BookingsTable::class];
        $this->Bookings = $this->getTableLocator()->get('Bookings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bookings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BookingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BookingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
