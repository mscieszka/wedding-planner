<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\OffersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\OffersController Test Case
 *
 * @uses \App\Controller\OffersController
 */
class OffersControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\OffersController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\OffersController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\OffersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\OffersController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\OffersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
