<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Icon\TrashIcon;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Workflow\App\Wiki\Parameter\WikiItemParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiEditSite;
use Nemundo\Workflow\App\Wiki\Site\WikiItemDeleteSite;

class WikiContentView extends AbstractContentView
{


    public function getHtml()
    {

        $wikiReader = new WikiReader();
        $wikiReader->filter->andEqual($wikiReader->model->pageId, $this->dataId);
        $wikiReader->filter->andEqual($wikiReader->model->delete, false);

        $wikiReader->addOrder($wikiReader->model->id, SortOrder::DESCENDING);

        foreach ($wikiReader->getData() as $wikiRow) {

            $contentType = $wikiRow->contentType->getContentTypeClassObject();

            $title = new AdminSubtitle($this);
            $title->content = $contentType->contentName;

            $item = $contentType->getView($this);
            $item->dataId = $wikiRow->dataId;
            $item->id = $wikiRow->dataId;
            $item->tagName = 'div';


            $formUpdate = $contentType->getFormUpdate();
            if ($formUpdate !== null) {
                $btn = new AdminButton($this);
                $btn->site = clone(WikiEditSite::$site);
                $btn->site->addParameter(new WikiItemParameter($wikiRow->id));
                new EditIcon($btn);
            }


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


        /*

        $title = new AdminTitle($this);
        $title->content = 'Gelöschte Objekte';



        $wikiReader = new WikiReader();
        $wikiReader->filter->andEqual($wikiReader->model->pageId, $this->dataId);
        $wikiReader->filter->andEqual($wikiReader->model->delete, true);

        $wikiReader->addOrder($wikiReader->model->id, SortOrder::DESCENDING);

        foreach ($wikiReader->getData() as $wikiRow) {

            $contentType = $wikiRow->contentType->getContentTypeClassObject();

            $title = new AdminSubtitle($this);
            $title->content = $contentType->name;


            $item = $contentType->getItem($this);
            $item->dataId = $wikiRow->dataId;
            $item->id = $wikiRow->dataId;
            $item->tagName = 'div';

            (new Hr($this));

        }
*/


        return parent::getHtml();

    }


}