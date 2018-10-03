<?php

namespace Nemundo\Workflow\App\Stream\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamPaginationReader;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamReader;
use Nemundo\Workflow\App\Stream\Reader\StreamContentTypeReader;
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


        $streamReader = new StreamContentTypeReader();
        $streamReader->limit = 50;


        foreach ($streamReader->getData() as $contentType) {

            $widget = new AdminWidget($page);
            $widget->widgetTitle = $contentType->getSubject();

            $contentType->getView($widget);

            $btn = new AdminButton($widget);
            $btn->content = 'Weiter';
            $btn->site = $contentType->getViewSite();

        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $streamReader->getPaginationReader();

        $page->render();

    }
}