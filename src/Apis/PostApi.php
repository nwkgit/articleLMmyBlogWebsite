<?php

namespace MyWebsite\Apis;

use Dallgoot\Yaml\Yaml;

class PostApi
{

    const PATH = __DIR__ . '/../data/posts/';

    public function convertPost($rawYear, $rawFilename)
    {
        $yearBasename = basename($rawYear);
        $postBasename = basename($rawFilename);

        $id = $yearBasename . '_' . str_replace('.yml', '', $postBasename);

        $post =  Yaml::parse(file_get_contents(self::PATH . '/' . $yearBasename . '/' . $postBasename));
        $post->id = $id;

        return $post;
    }

    protected function getFileList($path, $sortingOrder = SCANDIR_SORT_ASCENDING)
    {
        $fileList = [];

        $rawFileList = scandir($path, $sortingOrder);
        foreach ($rawFileList as $rawFileLoop) {

            if (substr($rawFileLoop, 0, 1) == '.') continue;

            $fileList[] = $rawFileLoop;
        }
        return $fileList;
    }

    public function findAll()
    {

        $postList = [];

        $yearDirList = $this->getFileList(self::PATH);
        foreach ($yearDirList as $yearDirLoop) {

            $postFileList = $this->getFileList(self::PATH . '/' . $yearDirLoop);
            foreach ($postFileList as $postFileLoop) {

                $postList[] = $this->convertPost($yearDirLoop,  $postFileLoop);
            }
        }

        return $postList;
    }

    public function findListLast($max = 5)
    {
        $postList = [];

        $yearDirList = $this->getFileList(self::PATH, SCANDIR_SORT_DESCENDING);
        foreach ($yearDirList as $yearDirLoop) {

            $postFileList = $this->getFileList(self::PATH . '/' . $yearDirLoop, SCANDIR_SORT_DESCENDING);
            foreach ($postFileList as $postFileLoop) {

                $postList[] = $this->convertPost($yearDirLoop,  $postFileLoop);
                if (count($postList) > $max) {
                    break;
                }
            }
        }

        return $postList;
    }
}
