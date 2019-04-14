<?php

namespace Nemundo\Workflow\App\Cms\Com;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Web\Controller\AbstractController;

class SiteInformation extends AbstractHtmlContainer
{


    public function getHtml()
    {

        $layout = new BootstrapThreeColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'Site Information';

        $site = AbstractController::$currentSite;

        // 404Site etc.
        if ($site !== null) {

            $table = new AdminLabelValueTable($widget);
            $table->addLabelValue('Title', $site->title);
            $table->addLabelValue('Url', $site->url);
            $table->addLabelValue('Url', $site->getUrl());
            $table->addLabelYesNoValue('Restricted', $site->restricted);

            $table->addLabelYesNoValue('Accessable', $site->isAccessable());

            // Vererbte Rechte

            if ($site->restricted) {

                $list = new UnorderedList();
                foreach ($site->getRestrictedUsergroupList() as $usergroup) {
                    $list->addText($usergroup->usergroup);
                }
                $table->addLabelValue('Restricted Usergroup', $list->getHtml());

            }

        }

        return parent::getHtml();

    }

}