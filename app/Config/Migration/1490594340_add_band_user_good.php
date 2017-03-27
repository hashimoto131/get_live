<?php
class AddBandtableAddUsertable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_bandtable_add_usertable';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
 public $migration = [
	 'up' => [
		 'create_table' => [
			 'users' => [
				 'id' => [
					 'type'    =>'string',
					 'null'    => false,
					 'default' => null,
					 'length'  => 11,
					 'key'     => 'primary'
				 ],
				 'band_id' => [
					 'type'    =>'integer',
				 ],
				 'name' => [
					 'type'    =>'string',
					 'default' => null
				 ],
				 'password' => [
					 'type' => 'string',
					 'default' => null
				 ],
				 'created' => [
					 'type' => 'datetime'
				 ],
				 'modified' => [
					 'type' => 'datetime'
				 ],
				 'indexes' => [
					 'PRIMARY' => [
						 'column' => 'id',
						 'unique' => 1
					 ]
				 ]
			 ],
			 'bands' => [
				 'id' => [
					 'type'    =>'string',
					 'null'    => false,
					 'default' => null,
					 'length'  => 11,
					 'key'     => 'primary'
				 ],
				 'name' => [
					 'type'    =>'string',
					 'default' => null
				 ],
				 'created' => [
					 'type' => 'datetime'
				 ],
				 'modified' => [
					 'type' => 'datetime'
				 ],
				 'indexes' => [
					 'PRIMARY' => [
						 'column' => 'id',
						 'unique' => 1
					 ]
				 ]
			 ],
			 'goods' => [
				 'id' => [
					 'type'    =>'string',
					 'null'    => false,
					 'default' => null,
					 'length'  => 11,
					 'key'     => 'primary'
				 ],
				 'user_id' => [
					 'type'    =>'string',
					 'default' => null
				 ],
				 'live_id' => [
					 'type'    =>'string',
					 'default' => null
				 ],
				 'created' => [
					 'type' => 'datetime'
				 ],
				 'modified' => [
					 'type' => 'datetime'
				 ],
				 'indexes' => [
					 'PRIMARY' => [
						 'column' => 'id',
						 'unique' => 1
					 ]
				 ]
			 ],

		 ]
	 ],
	 'down' => [
	 ],
 ];

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
