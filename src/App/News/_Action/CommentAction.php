<?php

namespace Nemundo\Workflow\App\News\Action;


use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\News\Content\CommentContentType;
use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\News\Data\Comment\AbstractCommentAction;
use Nemundo\Workflow\App\News\Data\News\AbstractNewsAction;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class CommentAction extends AbstractCommentAction
{

    public function run($id)
    {

        $commentRow = $this->getRow();

        $builder = new NotificationBuilder();
        $builder->contentType = new CommentContentType();
        $builder->subject = 'News Kommentar';  // $commentRow->title;
        $builder->dataId = $commentRow->id;
        $builder->createUsergroupNotification(new SchleunigerUsergroup());



    }

}