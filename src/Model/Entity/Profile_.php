<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class Profile extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'title' => true,
		'fname' => true,
		'lname' => true,
		'username' => true,
		'email' => true,
		'password' => true,
		'address' => true,
		'phone' => true,
		'image' => true,
		'admin' => true,
		'super' => true,
        'profile_type' => true
	];

}
