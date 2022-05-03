<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OffersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OffersTable Test Case
 */
class OffersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OffersTable
     */
    protected $Offers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Offers',
        'app.Users',
        'app.Categories',
        'app.Addresses',
        'app.Bookings',
        'app.CateringFilters',
        'app.HallFilters',
        'app.MusicFilters',
        'app.OfferActiveDays',
        'app.Ratings',
        'app.SavedUserOffers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Offers') ? [] : ['className' => OffersTable::class];
        $this->Offers = $this->getTableLocator()->get('Offers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Offers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OffersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OffersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
