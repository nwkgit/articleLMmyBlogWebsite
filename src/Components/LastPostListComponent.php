<?php

namespace MyWebsite\Components;

use MyWebsite\Apis\PostApi;
use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;


class LastPostListComponent extends ComponentAbstract implements ComponentInterface
{
    public function render(): string
    {

        $postApi = new PostApi();

        $postsList = $postApi->findListLast();


        return $this->renderViewWithParamList(
            __DIR__ . '/Posts/postList.php',
            [
                'postsList' => $postsList
            ]
        );
    }
}
