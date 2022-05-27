<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offers Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\CateringFiltersTable&\Cake\ORM\Association\HasMany $CateringFilters
 * @property \App\Model\Table\HallFiltersTable&\Cake\ORM\Association\HasMany $HallFilters
 * @property \App\Model\Table\MusicFiltersTable&\Cake\ORM\Association\HasMany $MusicFilters
 * @property \App\Model\Table\OfferActiveDaysTable&\Cake\ORM\Association\HasMany $OfferActiveDays
 * @property \App\Model\Table\RatingsTable&\Cake\ORM\Association\HasMany $Ratings
 * @property \App\Model\Table\SavedUserOffersTable&\Cake\ORM\Association\HasMany $SavedUserOffers
 *
 * @method \App\Model\Entity\Offer newEmptyEntity()
 * @method \App\Model\Entity\Offer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Offer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Offer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OffersTable extends Table
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

        $this->setTable('offers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Bookings', [
            'foreignKey' => 'offer_id',
        ]);
        $this->hasOne('CateringFilters', [
            'foreignKey' => 'offer_id',
            'dependent' => true,
        ]);
        $this->hasOne('HallFilters', [
            'foreignKey' => 'offer_id',
            'dependent' => true,
        ]);
        $this->hasOne('MusicFilters', [
            'foreignKey' => 'offer_id',
            'dependent' => true,
        ]);
        $this->hasOne('OfferActiveDays', [
            'foreignKey' => 'offer_id',
            'dependent' => true,
        ]);
        $this->hasMany('Ratings', [
            'foreignKey' => 'offer_id',
        ]);
        $this->hasMany('SavedUserOffers', [
            'foreignKey' => 'offer_id',
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->decimal('advance_payment')
            ->allowEmptyString('advance_payment');

        $validator
            ->scalar('website')
            ->allowEmptyString('website');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn('address_id', 'Addresses'), ['errorField' => 'address_id']);
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }

    public function afterDelete($event, $entity, $options) {
        $address = $this->Addresses->get($entity->address_id);
        $this->Addresses->delete($address);
    }
}
