<div class="my-contain">
    <?php if ( !empty($posts) ) : ?>
        <?php foreach ($posts as $post): ?>
    
            <?= $post['title'] ?>
            <?= $post['text'] ?><br>

        <?php endforeach; ?>
    <?php endif; ?>
</div>