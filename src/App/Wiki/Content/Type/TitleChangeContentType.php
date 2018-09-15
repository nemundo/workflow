<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\Core\Url\UrlConverter;
use Nemundo\Workflow\App\Wiki\Data\TitleChange\TitleChangeModel;
use Nemundo\Workflow\App\Wiki\Data\TitleChange\TitleChangeReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageUpdate;

class TitleChangeContentType extends AbstractWikiContentType
{

    protected function loadData()
    {

        $this->contentName = 'Title Change';
        $this->contentId = '3bcd1384-569b-49f5-a2f6-416b2d3f82a6';
        $this->modelClass = TitleChangeModel::class;

    }


    public function onWikiCreate($pageId, $itemId)
    {

        $row = (new TitleChangeReader())->getRowById($itemId);

        $update = new WikiPageUpdate();
        $update->title = $row->title;
        $update->url = (new UrlConverter())->convertToUrl($row->title);
        $update->updateById($pageId);


    }

}