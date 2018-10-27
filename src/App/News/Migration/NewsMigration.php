<?php

namespace Nemundo\Workflow\App\News\Migration;


use Nemundo\App\Migration\Type\AbstractMigration;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Install\NewsInstall;
use Nemundo\Workflow\App\News\Install\NewsUninstall;

class NewsMigration extends AbstractMigration
{

    protected function loadMigration()
    {
        $this->app = 'news';
        $this->version = 1;
        $this->filename = 'news.json';
    }


    public function exportData()
    {

        $reader = new NewsReader();
        foreach ($reader->getData() as $newsRow) {
            $newsType = new NewsContentType($newsRow->id);
            $this->addJsonData($newsType->getJson());
        }

    }


    public function importData()
    {

        (new NewsUninstall())->run();
        (new NewsInstall())->run();

        foreach ($this->getJsonData() as $jsonRow) {

            $newsType = new NewsContentType();
            $newsType->importJson($jsonRow);

        }

    }


}