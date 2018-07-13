<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\FontAwesome\Icon\EditIcon;
use Nemundo\Design\FontAwesome\Icon\TrashIcon;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Wiki\Parameter\WikiItemParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiEditSite;
use Nemundo\Workflow\App\Wiki\Site\WikiItemDeleteSite;

class WikiContentItem extends AbstractContentItem
{


    public function getHtml()
    {

        $wikiReader = new WikiReader();
        $wikiReader->filter->andEqual($wikiReader->model->pageId, $this->dataId);
        $wikiReader->addOrder($wikiReader->model->id, SortOrder::DESCENDING);

        foreach ($wikiReader->getData() as $wikiRow) {

            $contentType = $wikiRow->contentType->getContentTypeClassObject();

            $item = $contentType->getItem($this);
            $item->dataId = $wikiRow->dataId;
            $item->id = $wikiRow->dataId;
            $item->tagName = 'div';

            $btn = new AdminButton($this);
            $btn->site = clone(WikiEditSite::$site);
            $btn->site->addParameter(new WikiItemParameter($wikiRow->id));
            new EditIcon($btn);

            $btn = new AdminButton($this);
            $btn->site = clone(WikiItemDeleteSite::$site);
            $btn->site->addParameter(new WikiItemParameter($wikiRow->id));
            new TrashIcon($btn);


            $site = $contentType->getItemSite($wikiRow->dataId);

            if ($site !== null) {
                $btn = new AdminButton($this);
                $btn->content = '...';
                $btn->site = $site;
            }


            (new Hr($this));

        }


        return parent::getHtml();

    }


}