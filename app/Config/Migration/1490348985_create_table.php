<?php
class CreateTable extends CakeMigration
{

/**
 * Migration description
 *
 * @var string
 */
    public $description = 'create_table';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
    public $migration = [
        'up' => [
            'create_table' => [
                'lives' => [
                    'id' => [
                        'type'    =>'string',
                        'null'    => false,
                        'default' => null,
                        'length'  => 36,
                        'key'     => 'primary'
                    ],
                    'organizer_id' => [
                        'type'    =>'integer',
                    ],
                    'name' => [
                        'type'    =>'string',
                        'default' => null
                    ],
                    'detail' => [
                        'type' => 'text',
                        'default' => null
                    ],
                    'created' => [
                        'type' => 'datetime'
                    ],
                    'modified' => [
                        'type' => 'datetime'
                    ],
                    'start_date' => [
                        'type' => 'datetime',
                        'default' => null
                    ],
                    'join_start_date' => [
                        'type' => 'datetime',
                        'default' => null
                    ],
                    'cost' => [
                        'type' => 'integer',
                        'default' => null
                    ],
                    'place' => [
                        'type' => 'string',
                        'default' => null
                    ],
                    'indexes' => [
                        'PRIMARY' => [
                            'column' => 'id',
                            'unique' => 1
                        ]
                    ]
                ],
                'organizers' => [
                    'id' => [
                        'type'    =>'string',
                        'null'    => false,
                        'default' => null,
                        'length'  => 36,
                        'key'     => 'primary'
                    ],
                    'name' => [
                        'type'    =>'string',
                        'default' => null
                    ],
                    'event_name' => [
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
                ]
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
    public function before($direction)
    {
        return true;
    }

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
    public function after($direction)
    {
        return true;
    }
}
