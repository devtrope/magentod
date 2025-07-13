<footer>
    <div class="footer-content">
        <div class="footer-content__block">
            <img src="<?= $shop['logo_image'] ?>" alt="<?= $shop['logo_alt'] ?>" class="logo">
            <p><?= $shop['footer']['text'] ?></p>
        </div>
        <?php foreach ($shop['footer']['blocks'] as $block): ?>
            <div class="footer-content__block">
                <div class="footer-title"><?= $block['title'] ?></div>
                <ul>
                    <?php foreach ($block['links'] as $link): ?>
                        <li><a href="<?= $link['link'] ?>"><?= $link['label'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</footer>