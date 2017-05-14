<div class="my-contain">
    <button class="btn btn-default" id="send">Кнопка</button>

    <br>

    <?php if ( !empty($posts) ) : ?>
        <?php foreach ($posts as $post): ?>

            <?= $post['title'] ?><br>
            <?= $post['text'] ?><br><br>

        <?php endforeach; ?>
    <?php endif; ?>
</div>