<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MusicFiltersFixture
 */
class MusicFiltersFixture extends TestFixture
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
                'disco_polo' => 1,
                'pop' => 1,
                'rock' => 1,
                'oldies' => 1,
                'world_music' => 1,
                'running_games' => 1,
                'created' => 1651576253,
            ],
        ];
        parent::init();
    }
}
