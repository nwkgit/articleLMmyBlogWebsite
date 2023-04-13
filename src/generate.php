<?php

use MyWebsite\Apis\PostApi;
use MyWebsite\Pages\AboutPage;
use MyWebsite\Pages\HomePage;
use MyWebsite\Pages\PostDetailPage;

require __DIR__ . '/../vendor/autoload.php';

$pagesList = [

    new HomePage(),
    new AboutPage()
    //new OtherPage()

];

$postApi = new PostApi();
foreach ($postApi->findAll() as $postLoop) {
    $pagesList[] = new PostDetailPage($postLoop);
}

foreach ($pagesList as $pageLoop) {
    print("Generate " . $pageLoop->getFilename() . "\n");
    $pageLoop->generateTo(__DIR__ . '/../docs/');
}
