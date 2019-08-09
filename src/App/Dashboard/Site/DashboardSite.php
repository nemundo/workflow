<?php

namespace Nemundo\Workflow\App\Dashboard\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Dashboard\Com\DashboardContainer;
use Nemundo\Workflow\App\Dashboard\Com\DashboardForm;
use Nemundo\Workflow\App\Dashboard\Data\DashboardContentType\DashboardContentTypeReader;

class DashboardSite extends AbstractSite
{

    /**
     * @var DashboardSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Dashboard (Dev)';
        $this->url = 'dashboard';

        DashboardSite::$site = $this;

        new DashboardSortableSite($this);

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $layout = new BootstrapThreeColumnLayout($page);
        //$layout = new BootstrapThreeColumnLayout($page);
        $layout->col1->columnWidth = 9;
        $layout->col2->columnWidth = 3;


        $form = new DashboardForm($layout->col2);
        $form->redirectSite = DashboardSite::$site;

        new DashboardContainer($layout->col1);


        /*
        $contentTypeParameter = new ContentTypeParameter();

        $form = new SearchForm($page);

        $listbox = new BootstrapListBox($form);
        $listbox->name = $contentTypeParameter->getParameterName();
        $listbox->submitOnChange = true;
        $listbox->value = $listbox->getValue();

        $reader = new DashboardContentTypeReader();

        foreach ($reader->getData() as $dashboardContentTypeRow) {
            $listbox->addItem($dashboardContentTypeRow->contentTypeId, $dashboardContentTypeRow->contentType->contentType);
        }


        if ($contentTypeParameter->exists()) {

            $widget = new AdminWidget($page);

            $contentType = $contentTypeParameter->getContentType();
            $widget->widgetTitle = $contentType->getSubject();
            $contentType->getView($widget);

        }*/


        $page->render();


    }
}