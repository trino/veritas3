<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logos Model
 */
class OrdersTable extends Table {

/**
 * Initialize method
 * 
 * 
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
public function initialize(array $config)
    {
        $this->belongsTo('Profiles', [
            'foreignKey' => 'user_id',]);
        $this->hasMany('PreScreening', [
            'className' => 'PreScreening',
            
        ]);
        $this->hasMany('DriverApplication', [
            'className' => 'PreScreening',
            
        ]);
        $this->hasMany('RoadTest', [
            'className' => 'RoadTest',
            
        ]);
        $this->hasMany('ConsentForm', [
            'className' => 'ConsentForm',
            
        ]);
         
    }
	
/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	

}
