<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Components\NavComponent;
use MyWebsite\Components\PostDetailComponent;

class PostDetailPage extends PageAbstract implements PageInterface
{

    const FILENAME = 'post_ID.html';

    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function getFilename(): string
    {
        return $this->getPostFilename($this->post);
    }

    public static function getPostFilename(object $post)
    {
        return str_replace('ID', $post->id, self::FILENAME);
    }

    public function render(): string
    {
        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => [
                    new PostDetailComponent($this->post->title, $this->post->content),
                ]
            ]
        );
    }
}
