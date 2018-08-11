<?php

namespace Nemundo\Workflow\App\News\Content;


use Nemundo\Workflow\App\News\Site\CommentRedirectSite;
use Nemundo\Workflow\App\News\Site\NewsItemSite;
use Nemundo\App\Content\Type\AbstractContentType;

class CommentContentType extends AbstractContentType
{

    protected function loadData()
    {
        $this->name = 'News Comment';
        $this->id = '3cf44cd4-a6ff-44b3-8c89-21770e62a39f';
        $this->itemSite = CommentRedirectSite::$site;
        $this->itemClass = CommentContentItem::class;
    }

}