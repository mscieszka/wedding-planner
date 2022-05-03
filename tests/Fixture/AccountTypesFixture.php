<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountTypesFixture
 */
class AccountTypesFixture extends TestFixture
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
                'account_name' => 'Lorem ipsum dolor sit amet',
                'created' => 1651575915,
            ],
        ];
        parent::init();
    }
}
