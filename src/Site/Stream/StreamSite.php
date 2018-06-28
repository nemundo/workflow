<?php

namespace Nemundo\Workflow\Site\Stream;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamReader;
use Nemundo\Workflow\Parameter\DataIdParameter;
use Paranautik\App\Meteoschweiz\Content\AllgemeineLageContentItem;

class StreamSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Stream';
        $this->url = 'stream';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $streamReader = new StreamReader();
        $streamReader->model->loadContentType();
        $streamReader->addOrder($streamReader->model->dateTime, SortOrder::DESCENDING);
        $streamReader->limit = 20;

        foreach ($streamReader->getData() as $streamRow) {


            //$title = new AdminTitle($page);
            //$title->content = $streamRow->subject;



            $widget = new AdminWidget($page);

            $contentType = $streamRow->contentType->getContentTypeClassObject();

            //$title = new AdminTitle($page);
            $widget->widgetTitle = $streamRow->dateTime->getShortDateTimeLeadingZeroFormat() . ' ' . $contentType->name;


            $item = $contentType->getItem($widget);
            $item->contentType = $contentType;
            $item->dataId = $streamRow->dataId;

            if ($contentType->itemSite !== null) {

                $btn = new AdminButton($widget);
                $btn->content = 'Weiter';
                $btn->site = $contentType->itemSite;
                $btn->site->addParameter(new DataIdParameter($streamRow->dataId));

            }


        }


        $page->render();


    }


}