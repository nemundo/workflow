<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\App\Content\Item\AbstractContentItem;

class WikiContentItem extends AbstractContentItem
{


    public function getHtml()
    {

        $wikiReader = new WikiReader();
        $wikiReader->filter->andEqual($wikiReader->model->pageId, $this->dataId);
        $wikiReader->addOrder($wikiReader->model->id, SortOrder::DESCENDING);

        foreach ($wikiReader->getData() as $wikiRow) {


            (new Debug())->write($wikiRow->dataId);

            $contentType = $wikiRow->contentType->getContentTypeClassObject();

            $item = $contentType->getItem($this);
            $item->dataId = $wikiRow->dataId;
            $item->id = $wikiRow->dataId;
            $item->tagName = 'div';

            (new Hr($this));

        }


        return parent::getHtml();

    }


}