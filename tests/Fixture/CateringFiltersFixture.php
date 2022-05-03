<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CateringFiltersFixture
 */
class CateringFiltersFixture extends TestFixture
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
                'polish' => 1,
                'italian' => 1,
                'american' => 1,
                'french' => 1,
                'asian' => 1,
                'vegan' => 1,
                'vegetarian' => 1,
                'gluten_free' => 1,
                'created' => 1651576290,
            ],
        ];
        parent::init();
    }
}
