<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfferActiveDays Model
 *
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\BelongsTo $Offers
 *
 * @method \App\Model\Entity\OfferActiveDay newEmptyEntity()
 * @method \App\Model\Entity\OfferActiveDay newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OfferActiveDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OfferActiveDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\OfferActiveDay findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OfferActiveDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OfferActiveDay[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OfferActiveDay|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OfferActiveDay saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OfferActiveDay[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OfferActiveDay[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OfferActiveDay[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OfferActiveDay[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OfferActiveDaysTable extends Table
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

        $this->setTable('offer_active_days');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Offers', [
            'foreignKey' => 'offer_id',
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
            ->boolean('monday')
            ->requirePresence('monday', 'create')
            ->notEmptyString('monday');

        $validator
            ->boolean('tuesday')
            ->requirePresence('tuesday', 'create')
            ->notEmptyString('tuesday');

        $validator
            ->boolean('wednesday')
            ->requirePresence('wednesday', 'create')
            ->notEmptyString('wednesday');

        $validator
            ->boolean('Thursday')
            ->requirePresence('Thursday', 'create')
            ->notEmptyString('Thursday');

        $validator
            ->boolean('friday')
            ->requirePresence('friday', 'create')
            ->notEmptyString('friday');

        $validator
            ->boolean('saturday')
            ->requirePresence('saturday', 'create')
            ->notEmptyString('saturday');

        $validator
            ->boolean('sunday')
            ->requirePresence('sunday', 'create')
            ->notEmptyString('sunday');

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

        return $rules;
    }
}
