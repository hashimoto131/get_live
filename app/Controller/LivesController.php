<?php
App::uses('AppController', 'Controller');
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
/**
 * Live Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 */
class LivesController extends AppController
{
    public $uses = ['Live','Organizer'];

    /**
     * ライブ情報の一覧表示
     * @return ライブ情報の一覧情報
     */
    public function index()
    {
        $lives = $this->Live->all();
        $this->set('lives', $lives);
    }

    /**
     * ライブ情報詳細を取得
     * @param  $id 取得するライブ情報のid
     * @return 一件のライブ情報
     */
    public function show($id)
    {
        $id = $this->request->pass[0];
        $live = $this->Live->show($id);
        $this->set('live', $live);
    }


    /**
     * 指定したライブにいいねをする
     * @param $id 取得するライブ情報のid
     * @return 一件のライブに対していいねをつける。
     */
    public function addGood($id)
    {
    }

    /**
     * ライブ情報のスクレイピング
     * @return
     */
    public function getLives()
    {
        $this->autoRender = false;
        App::import('Vendor', 'phpQuery/phpQuery/phpQuery');
        $data = [];
        $html = "http://maple.dojin.com/?cat=10";
        $dom = new DOMDocument;
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        // $doc = phpQuery::newDocumentFile(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        debug($dom['.post_content_wrapper:eq(1) .post_title a']->text());
    }

    /**
     * 反逆のメイプルページでのスクレイピング
     * @return [type] [description]
     */
    public function goutte()
    {
        $this->autoRender = false;
        $client = new Client();
        $crawler = $client->request('GET','http://maple.dojin.com/?cat=10');
        // debug($crawler->text());
        $dom = $crawler->filter('div.post_odd')->each(function($element){
            // debug($element->text());
            $title = $element->filter('h2.post_title a')->text();
            debug('ライブ名：'.$title);

            $acts = $element->filter('ul')->each(function($act){
                $acts = $act->text();
            });
            debug('出演者：'.$acts);
            //
            $place = $element->filter('p a')->text();
            debug('ライブハウス：'.$place);
        });
        $dom = $crawler->filter('div.post_even')->each(function($element){
            debug($element->text());
        });
    }

    /**
     * アニソンハーツでのスクレイピング
     * @return [type] [description]
     */
    public function goutteAnisonHearts()
    {

        $this->autoRender = false;
        $client = new Client();
        //まずは各ページのURLを取得
        $liveUrls = [];
        $crawler = $client->request('GET','http://anisonhearts.com/requirement/');
        $dom = $crawler->filter('h3 + ul')->each(function($element) use(&$liveUrls){
            $live = $element->filter('li')->each(function($li) use(&$liveUrls){
                if(count($li->filter('a')) !== 0){
                    $liveUrls[] = $li->filter('a')->attr('href');
                }
            });
        });
        debug($liveUrls);

        foreach ($liveUrls as $url) {
            $post =[];
            $crawler = $client->request('GET', $url);
            $post['Live']['start_date'] = $crawler->filter('h1 + h2 span')->text();
            $post['Live']['place'] = $crawler->filter('h2 + p a')->text();
            $post['Live']['detail'] = $crawler->filter('h3#i-15 span')->text();
            $post['Live']['cost'] = $crawler->filter('h3#i-13 span')->text();
            debug($post);
        }


    }
}
