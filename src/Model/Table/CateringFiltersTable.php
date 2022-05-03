<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CateringFilters Model
 *
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\BelongsTo $Offers
 *
 * @method \App\Model\Entity\CateringFilter newEmptyEntity()
 * @method \App\Model\Entity\CateringFilter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CateringFilter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CateringFilter get($primaryKey, $options = [])
 * @method \App\Model\Entity\CateringFilter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CateringFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CateringFilter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CateringFilter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CateringFilter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CateringFilter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CateringFilter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CateringFilter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CateringFilter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CateringFiltersTable extends Table
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

        $this->setTable('catering_filters');
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
            ->boolean('polish')
            ->allowEmptyString('polish');

        $validator
            ->boolean('italian')
            ->allowEmptyString('italian');

        $validator
            ->boolean('american')
            ->allowEmptyString('american');

        $validator
            ->boolean('french')
            ->allowEmptyString('french');

        $validator
            ->boolean('asian')
            ->allowEmptyString('asian');

        $validator
            ->boolean('vegan')
            ->allowEmptyString('vegan');

        $validator
            ->boolean('vegetarian')
            ->allowEmptyString('vegetarian');

        $validator
            ->boolean('gluten_free')
            ->allowEmptyString('gluten_free');

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
