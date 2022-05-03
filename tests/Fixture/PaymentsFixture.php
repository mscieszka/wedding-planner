<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'is_paid' => 1,
                'is_returned' => 1,
                'price' => 1.5,
                'created' => 1651576475,
            ],
        ];
        parent::init();
    }
}
