<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;


class PostDetailComponent extends ComponentAbstract implements ComponentInterface
{
    protected $title;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function render(): string
    {

        return $this->renderViewWithParamList(
            __DIR__ . '/Posts/postDetail.php',
            [
                'title' => $this->title,
                'content' => $this->content,

            ]
        );
    }
}
