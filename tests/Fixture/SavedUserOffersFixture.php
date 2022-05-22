<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SavedUserOffersFixture
 */
class SavedUserOffersFixture extends TestFixture
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
                'created' => 1653248059,
            ],
        ];
        parent::init();
    }
}
