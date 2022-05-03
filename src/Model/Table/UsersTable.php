<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AccountTypesTable&\Cake\ORM\Association\BelongsTo $AccountTypes
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\HasMany $Offers
 * @property \App\Model\Table\RatingsTable&\Cake\ORM\Association\HasMany $Ratings
 * @property \App\Model\Table\SavedUserBookingsTable&\Cake\ORM\Association\HasMany $SavedUserBookings
 * @property \App\Model\Table\SavedUserOffersTable&\Cake\ORM\Association\HasMany $SavedUserOffers
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AccountTypes', [
            'foreignKey' => 'account_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Bookings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Offers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Ratings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SavedUserBookings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SavedUserOffers', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('surname')
            ->requirePresence('surname', 'create')
            ->notEmptyString('surname');

        $validator
            ->scalar('phone_number')
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->boolean('enabled')
            ->allowEmptyString('enabled');

        $validator
            ->boolean('confirmed_email')
            ->allowEmptyString('confirmed_email');

        $validator
            ->scalar('company_name')
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('krs')
            ->allowEmptyString('krs');

        $validator
            ->scalar('nip')
            ->requirePresence('nip', 'create')
            ->notEmptyString('nip');

        $validator
            ->scalar('regon')
            ->allowEmptyString('regon');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn('account_type_id', 'AccountTypes'), ['errorField' => 'account_type_id']);

        return $rules;
    }
}
