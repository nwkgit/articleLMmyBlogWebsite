<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Pages\AboutPage;
use MyWebsite\Pages\HomePage;

class NavComponent extends ComponentAbstract implements ComponentInterface
{

    protected $pageSelected;

    public function __construct($pageSelected)
    {
        $this->pageSelected = $pageSelected;
    }

    public function render(): string
    {
        $linkList = [
            'Accueil' => HomePage::FILENAME,
            'A propos' => AboutPage::FILENAME

        ];

        return $this->renderViewWithParamList(
            __DIR__ . '/Nav/nav.php',
            [
                'linkList' => $linkList,
                'pageSelected' => $this->pageSelected
            ]
        );
    }
}
