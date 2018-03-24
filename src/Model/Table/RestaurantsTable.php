<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Restaurants Model
 *
 * @property \App\Model\Table\CreditCardsTable|\Cake\ORM\Association\BelongsTo $CreditCards
 *
 * @method \App\Model\Entity\Restaurant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Restaurant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Restaurant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Restaurant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant findOrCreate($search, callable $callback = null, $options = [])
 */
class RestaurantsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('restaurants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->like('name',[
                'before' => true,
                'after' => true
        ]);


        $this->belongsTo('CreditCards', [
            'foreignKey' => 'credit_card_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('halal')
            ->allowEmpty('halal');

        $validator
            ->boolean('vegan')
            ->allowEmpty('vegan');

        $validator
            ->boolean('gluten_free')
            ->allowEmpty('gluten_free');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['credit_card_id'], 'CreditCards'));

        return $rules;
    }

    public function searchConfiguration()
    {
      $search = new Manager($this);
      $search
          ->value('name')
          ->compare('id',
              [
                  'operator' => '>='
              ]
              );
      return $search;
  }

}
