<?php

namespace Nemundo\Workflow\App\News\Action;


use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\AbstractNewsAction;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class NewsAction extends AbstractNewsAction
{

    public function run()
    {

        $newsRow = $this->getRow();

        $builder = new InboxBuilder();
        $builder->contentType = new NewsContentType();
        $builder->subject = $newsRow->title;
        $builder->dataId = $newsRow->id;
        $builder->createUsergroupInbox(new SchleunigerUsergroup());

        $builder = new SearchEngineBuilder();
        $builder->contentType = new NewsContentType();
        $builder->dataId = $newsRow->id;
        $builder->title = $newsRow->title;
        $builder->addText($newsRow->title);
        $builder->addText($newsRow->text);


    }

}