<h2>トップページ</h2>
<div>
    <div>
        <?php if (!empty($lives)):
        foreach ($lives as $live):?>
        <dl>
            <dt>開催日</dt>
            <dd><?php echo $live['Live']['start_date'];?></dd>
            <dt>イベント名</dt>
            <dd><?php echo $this->Html->link($live['Live']['name'], ['controller' => 'lives', 'action' => 'show', $live['Live']['id']]); ?></dd>
            <dt>応募受付開始</dt>
            <dd><?php echo $live['Live']['join_start_date'];?></dd>
            <dt>場所</dt>
            <dd><?php echo $live['Live']['place'];?></dd>
            <dt>ノルマ</dt>
            <dd><?php echo $live['Live']['cost'];?></dd>
        </dl>
        <hr>
    <?php endforeach; ?>
    <?php else: ?>
        <p>登録されたライブはありません</p>
    <?php endif;?>
    </div>
</div>
