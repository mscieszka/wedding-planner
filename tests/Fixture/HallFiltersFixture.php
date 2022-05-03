<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HallFiltersFixture
 */
class HallFiltersFixture extends TestFixture
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
                'hall_type_id' => 1,
                'air_conditioning' => 1,
                'garden' => 1,
                'terrace' => 1,
                'bar' => 1,
                'stage' => 1,
                'number_beds' => 1,
                'number_people' => 1,
                'price_for_the_night' => 1.5,
                'created' => 1651576340,
            ],
        ];
        parent::init();
    }
}
