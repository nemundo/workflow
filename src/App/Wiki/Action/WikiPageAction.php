<?php

namespace Nemundo\Workflow\App\Wiki\Action;


use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Wiki\ContentType\WikiContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\AbstractWikiPageAction;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class WikiPageAction extends AbstractWikiPageAction
{

    public function run()
    {

        $pageRow = $this->getRow();

        $builder = new InboxBuilder();
        $builder->contentType = new WikiContentType();
        $builder->dataId = $pageRow->id;
        $builder->subject = 'Wiki Eintrag: ' . $pageRow->title;
        $builder->createUsergroupInbox(new SchleunigerUsergroup());

    }

}