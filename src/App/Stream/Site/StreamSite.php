<?php

namespace Nemundo\Workflow\App\Stream\Site;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Stream\Reader\StreamContentTypeReader;

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

            if ($contentType->hasViewSite()) {
                $btn = new AdminSiteButton($widget);
                $btn->content = 'Weiter';
                $btn->site = $contentType->getViewSite();
            }

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $streamReader->getPaginationReader();

        $page->render();

    }
}