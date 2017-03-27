<?php
App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 */
class Organizer extends AppModel
{
    public $hasMany = [
        'Live' => [
            'className' => 'Live',
            'foreignKey' => 'organizer_id',
        ]
    ];

    /**
     * 主催者の新規登録
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
     * 主催者情報の編集
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
     * 主催者の一覧取得
     * @param null
     * @return [array] 主催者全件
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
    * idから一件主催者を取得
    * @param  [int] $id 取得したい主催者のid
    * @return [array] 指定した主催者情報を返す
    */
    public function show($id)
    {
        $options = [
            'conditions' => [
                'Organizer.id' => $id
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
