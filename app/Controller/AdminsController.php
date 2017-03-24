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
    public function liveList()
    {
        $lives = $this->Live->all($id);
        $this->set('lives', $lives);
    }

    /**
     * 主催者情報の一覧表示
     * @return 主催者情報の一覧情報
     */
    public function oganizerList()
    {
        $organizers = $this->Organizer->all($id);
        $this->set('organizers', $organizers);
    }

    /**
    * ライブ情報の登録
    * @return
    */
    public function addLive()
    {
        $successMessage = 'ライブの登録が完了しました。';
        $failMessage = 'ライブの登録に失敗しました。再度お試し下さい。';

        if ($this->request->params['id']) {
            $id = $this->request->params['id'];
            $live = $this->Live->show($id);
            $this->request->data = $live;
        }

        if (!empty($this->request->data)) {
            if ($this->request->is('post')) {
                $post = $this->request->data;
                $this->log($post);
                $result = $this->Live->add($post);
                if ($result) {
                    $this->Session->setFlash($successMessage);
                    $this->redirect(
                        array(
                            'controller' => 'admin',
                            'action' => 'index')
                    );
                } else {
                    // $this->Session->setFlash($this->Live->validationErrors);
                }
                $this->Session->setFlash($failMessage);
            }
        }
    }

    /**
    * 主催者情報の登録
    * @return
    */
    public function addOrganizer()
    {
        $successMessage = '主催者情報の登録が完了しました。';
        $failMessage = '主催者情報の登録に失敗しました。再度お試し下さい。';

        if ($this->request->params['id']) {
            $id = $this->request->params['id'];
            $live = $this->Organizer->show($id);
            $this->request->data = $live;
        }

        if (!empty($this->request->data)) {
            if ($this->request->is('post')) {
                $post = $this->request->data;
                $this->log($post);
                $result = $this->Organizer->add($post);
                if ($result) {
                    $this->Session->setFlash($successMessage);
                    $this->redirect(
                        array(
                            'controller' => 'admin',
                            'action' => 'index')
                    );
                } else {
                    // $this->Session->setFlash($this->Organizer->validationErrors);
                }
                $this->Session->setFlash($failMessage);
            }
        }
    }
}
