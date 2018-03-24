<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditCards Model
 *
 * @property \App\Model\Table\RestaurantsTable|\Cake\ORM\Association\HasMany $Restaurants
 *
 * @method \App\Model\Entity\CreditCard get($primaryKey, $options = [])
 * @method \App\Model\Entity\CreditCard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CreditCard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditCard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard findOrCreate($search, callable $callback = null, $options = [])
 */
class CreditCardsTable extends Table
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

        $this->setTable('credit_cards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Restaurants', [
            'foreignKey' => 'credit_card_id'
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

        return $validator;
    }
}
