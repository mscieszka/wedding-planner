<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HallFilters Model
 *
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\BelongsTo $Offers
 * @property \App\Model\Table\HallTypesTable&\Cake\ORM\Association\BelongsTo $HallTypes
 *
 * @method \App\Model\Entity\HallFilter newEmptyEntity()
 * @method \App\Model\Entity\HallFilter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HallFilter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HallFilter get($primaryKey, $options = [])
 * @method \App\Model\Entity\HallFilter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HallFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HallFilter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HallFilter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HallFilter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HallFilter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallFilter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallFilter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallFilter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HallFiltersTable extends Table
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

        $this->setTable('hall_filters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Offers', [
            'foreignKey' => 'offer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('HallTypes', [
            'foreignKey' => 'hall_type_id',
            'joinType' => 'INNER',
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
            ->boolean('air_conditioning')
            ->allowEmptyString('air_conditioning');

        $validator
            ->boolean('garden')
            ->allowEmptyString('garden');

        $validator
            ->boolean('terrace')
            ->allowEmptyString('terrace');

        $validator
            ->boolean('bar')
            ->allowEmptyString('bar');

        $validator
            ->boolean('stage')
            ->allowEmptyString('stage');

        $validator
            ->integer('number_beds')
            ->allowEmptyString('number_beds');

        $validator
            ->integer('number_people')
            ->allowEmptyString('number_people');

        $validator
            ->decimal('price_for_the_night')
            ->allowEmptyString('price_for_the_night');

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
        $rules->add($rules->existsIn('offer_id', 'Offers'), ['errorField' => 'offer_id']);
        $rules->add($rules->existsIn('hall_type_id', 'HallTypes'), ['errorField' => 'hall_type_id']);

        return $rules;
    }
}
