<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;

use MyWebsite\Components\NavComponent;
use MyWebsite\Components\PostDetailComponent;

class AboutPage extends PageAbstract implements PageInterface
{
    const FILENAME = 'about.html';

    public function getFilename(): string
    {
        return self::FILENAME;
    }

    public function render(): string
    {

        $title = 'A propos de ce site';
        $content = 'Ce site est juste un exemple de blog conçu avec le framework ';

        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => [
                    new PostDetailComponent($title, $content),
                ]
            ]
        );
    }
}
