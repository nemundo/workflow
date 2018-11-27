<?php

namespace Nemundo\Workflow\App\Wiki\Content\View;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Com\ChildContentViewContainer;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\App\Workflow\Com\WorkflowLogTable;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentType;


// View
class WikiPageView extends AbstractContentView
{

    public function getHtml()
    {

        //$this->contentType


        //$pageRow = (new WikiPageReader())->getRowById($this->dataId);

        //$wikiContentType = new WikiPageContentType($this->dataId);

        /*
        $btn = new AdminButton($this);
        $btn->content = 'edit';
        $btn->site = WikiPageSite::$site;
        $btn->site->addParameter(new WikiPageParameter($this->dataId));*/


        $title = new AdminTitle($this);
        $title->content = $this->contentType->getSubject();

        //$title->content = $wikiContentType->getSubject();  // $pageRow->title;

        //(new Debug())->write('123');


        $log = new ChildContentViewContainer($this);
        $log->contentType = $this->contentType;


        //$log = new ContentLogTable($this);
        //$log->contentType = $this->contentType;

        //$log = new ChildContentViewContainer($this);
        //$log->contentType = $wikiContentType;


        /*
        foreach ($wikiContentType->getChild() as $child) {


          //  (new Debug())->write($child->name);

            $child->getItem($this);

        }*/


        //$item = new WikiContentItem($this);
        //$item->dataId = $this->dataId;

        return parent::getHtml();

    }

}