<?php

namespace Nemundo\Workflow\App\Wiki\Content\Item;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\ContentItem\WikiContentItem;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;

class WikiPageContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $pageRow = (new WikiPageReader())->getRowById($this->dataId);

        $wikiContentType = new WikiPageContentType($this->dataId);

        $btn = new AdminButton($this);
        $btn->content = 'edit';
        $btn->site = WikiPageSite::$site;
        $btn->site->addParameter(new WikiPageParameter($this->dataId));


        $title = new AdminTitle($this);
        $title->content = $pageRow->title;

        //(new Debug())->write('123');

        foreach ($wikiContentType->getChild() as $child) {


          //  (new Debug())->write($child->name);

            $child->getItem($this);

        }


        //$item = new WikiContentItem($this);
        //$item->dataId = $this->dataId;

        return parent::getHtml();

    }

}