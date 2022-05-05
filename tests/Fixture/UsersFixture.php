<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'surname' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum dolor sit amet',
                'enabled' => 1,
                'confirmed_email' => 1,
                'company_name' => 'Lorem ipsum dolor sit amet',
                'krs' => 'Lorem ipsum dolor sit amet',
                'nip' => 'Lorem ipsum dolor sit amet',
                'regon' => 'Lorem ipsum dolor sit amet',
                'account_type_id' => 1,
                'created' => 1651750927,
            ],
        ];
        parent::init();
    }
}
