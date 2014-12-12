<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 */
class ProfilesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('profiles');
		$this->displayField('title');
		$this->primaryKey('id');
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->requirePresence('title', 'create')
			->notEmpty('title')
			->requirePresence('fname', 'create')
			->notEmpty('fname')
			->requirePresence('lname', 'create')
			->notEmpty('lname')
			->requirePresence('username', 'create')
			->notEmpty('username')
			->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
			->add('email', 'valid', ['rule' => 'email'])
			->requirePresence('email', 'create')
			->notEmpty('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
			->requirePresence('password', 'create')
			->notEmpty('password')
			->requirePresence('address', 'create')
			->notEmpty('address')
			->requirePresence('phone', 'create')
			->notEmpty('phone')
			->requirePresence('image', 'create')
			->notEmpty('image')
			->add('admin', 'valid', ['rule' => 'numeric'])
			->requirePresence('admin', 'create')
			->notEmpty('admin')
			->add('super', 'valid', ['rule' => 'numeric'])
			->requirePresence('super', 'create')
			->notEmpty('super');

		return $validator;
	}

}
