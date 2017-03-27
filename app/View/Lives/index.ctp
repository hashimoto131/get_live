
<div>
    <div>
        <?php if (!empty($lives)):
        foreach ($lives as $live):?>
        <div>
            <dl>
                <dt>開催日</dt>
                <dd><?php echo $live['Live']['start_date']?></dd>
                <dt>ライブタイトル</dt>
                <dd><?php echo $live['Live']['name']?></dd>
                <dt>応募受付開始</dt>
                <dd><?php echo $live['Live']['join_start_date']?></dd>
                <dt>場所</dt>
                <dd><?php echo $live['Live']['place']?></dd>
                <dt>ノルマ</dt>
                <dd><?php echo $live['Live']['cost']?></dd>
            </dl>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>登録されたライブはありません</p>
    <?php endif;?>
    </div>
</div>
