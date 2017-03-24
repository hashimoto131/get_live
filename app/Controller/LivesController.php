<?php
App::uses('AppController', 'Controller');
/**
 * Live Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 */
class LivesController extends AppController
{
    public $use = ['Live','Organizer'];


    /**
     * ライブ情報の一覧表示
     * @return ライブ情報の一覧情報
     */
    public function index()
    {
    }

    /**
     * ライブ情報詳細を取得
     * @param  $id 取得するライブ情報のid
     * @return 一件のライブ情報
     */
    public function show($id)
    {
    }

    /**
     * 指定したライブにいいねをする
     * @param $id 取得するライブ情報のid
     * @return 一件のライブに対していいねをつける。
     */
    public function addGood($id)
    {
    }
}
