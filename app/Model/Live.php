<?php
App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 */
class LiveModel extends AppModel
{
    public $name = 'Service';

    public $belongsTo = [
        'Organizer' => [
            'className' => 'Organizer',
            'foreignKey' => 'organizer_id',
        ]
    ];

    /**
     * ライブの新規登録
     * @param array $post 登録データ
     * @return bool
     **/
    public function add($post)
    {
        $result = $this->save($post);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * ライブ情報の編集
     * @param  [array] $post 編集情報
     * @return bool
     */
    public function edit_account($post)
    {
        $fieldList = ['id', 'organizer_id', 'name', 'detail', 'start_date', 'join_start_date', 'cost','place'];
        $result = $this->save($post, true, $fieldList);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * ライブの一覧取得
     * @param null
     * @return [array] ライブ全件
     **/
    public function all()
    {
        $results = $this->find('all');
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }

    /**
    * idから一件ライブを取得
    * @param  [int] $id 取得したいライブのid
    * @return [array] 指定したライブ情報を返す
    */
    public function show($id)
    {
        $options = [
            'conditions' => [
                'Live.id' => $id
            ]
        ];
        $results = $this->find('first', $options);
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
}
