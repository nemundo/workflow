<?php

namespace Nemundo\Workflow\App\Stream\Site;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamPaginationReader;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamReader;
use Nemundo\Workflow\App\Widget\Data\Widget\Widget;

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

        $streamReader = new StreamPaginationReader();
        $streamReader->addOrder($streamReader->model->id, SortOrder::DESCENDING);

        foreach ($streamReader->getData() as $streamRow) {

            $contentType = $streamRow->contentType->getContentTypeClassObject();

            $widget = new AdminWidget($page);
            $widget->widgetTitle = $streamRow->contentType->contentType . ': ' . $streamRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $item = $contentType->getItem($widget);
            $item->dataId = $streamRow->dataId;

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $streamReader;

        $page->render();

    }
}