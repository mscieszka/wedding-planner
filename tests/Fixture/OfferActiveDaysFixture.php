<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OfferActiveDaysFixture
 */
class OfferActiveDaysFixture extends TestFixture
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
                'offer_id' => 1,
                'monday' => 1,
                'tuesday' => 1,
                'wednesday' => 1,
                'Thursday' => 1,
                'friday' => 1,
                'saturday' => 1,
                'sunday' => 1,
                'created' => 1651576313,
            ],
        ];
        parent::init();
    }
}
