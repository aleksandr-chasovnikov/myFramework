<div class="my-contain">

    <?php if ( !empty($posts) ) : ?>
        <?php foreach ($posts as $post): ?>
    
            <?= $post['title'] ?><br>
            <?= $post['text'] ?><br><br>

        <?php endforeach; ?>
    <?php endif; ?>
</div>