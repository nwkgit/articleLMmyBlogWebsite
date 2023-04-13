<?php

use MyWebsite\Pages\PostDetailPage;

foreach ($this->paramList['postsList'] as $postLoop) : ?>
    <div class="card block">
        <header class="card-header">
            <p class="card-header-title">
                <?php echo $postLoop->datetime . ' : ' . $postLoop->title ?>
            </p>

            <button class="card-header-icon" aria-label="more options">
                <span class="icon">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
            </button>
        </header>
        <div class="card-content">

            <div class="content">
                <?php echo $postLoop->resume ?>
            </div>
        </div>
        <footer class="card-footer">
            <p class="card-footer-item">
                <span>
                    <a href="<?php echo PostDetailPage::getPostFilename($postLoop) ?>"> Voir la suite </a>
                </span>
            </p>

        </footer>
    </div>
<?php endforeach;
