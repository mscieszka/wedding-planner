<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 */
class BookingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'offer_id' => 1,
                'payment_id' => 1,
                'booking_date' => '2022-05-03',
                'release_date' => '2022-05-03',
                'is_released' => 1,
                'is_canceled' => 1,
                'created' => 1651576436,
            ],
        ];
        parent::init();
    }
}
