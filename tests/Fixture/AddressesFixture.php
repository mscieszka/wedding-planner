<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'street' => 'Lorem ipsum dolor sit amet',
                'house_number' => 'Lorem ipsum dolor sit amet',
                'postal_code' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'province_id' => 1,
                'created' => 1651575957,
            ],
        ];
        parent::init();
    }
}
