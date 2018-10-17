<?php

namespace Nemundo\Workflow\App\Wiki\ContentType;


use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\Wiki\Site\WikiRedirectSite;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class WikiNewsContentType //extends NewsContentType
{

    protected function loadData()
    {
        parent::loadData();

        $this->itemSite = WikiRedirectSite::$site;
        $this->parameterClass = DataIdParameter::class;

    }


    /*
    public function onCreate($dataId)
    {


        $newsRow = (new NewsReader())->getRowById($dataId);

        $builder = new NotificationBuilder();
        $builder->contentType = $this;
        $builder->dataId = $dataId;
        $builder->subject = 'Neu: ' . $newsRow->title;
        $builder->createUsergroupInbox(new SchleunigerUsergroup());


    }*/


    public function getSubject($dataId)
    {
        $newsRow = (new NewsReader())->getRowById($dataId);
        $subject = $newsRow->title;

        return $subject;



    }

}