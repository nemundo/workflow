<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class StatusMenuTable extends AbstractRestrictedUserHtmlContainer
{

    /**
     * @var AdminTable
     */
    private $table;

    protected function loadContainer()
    {
        $this->table = new AdminTable($this);
        //$this->table->border = 1;
    }


    /*
    public function addLogMenu($label, $id = null)
    {

        $row = new TableRow($this->table);

        new CheckIcon($row);

        $link = new Hyperlink($row);
        $link->content = $label;  // $workflowStatus->contentLabel;

        //$link->href = '#log-' . $workflowStatus->logId;

        $link->addCssClass(BootstrapFontColor::DARK);

        //$row->addText($workflowStatus->userCreated->displayName);
        //$row->addText($workflowStatus->dateTimeCreated->getShortDateLeadingZeroFormat());

    }*/


    public function addActiveMenuOld($label, $active = false)
    {

        $row = new TableRow($this->table);

        if ($active) {
            new ArrowRightIcon($row);
            $row->addBoldText($label);
        } else {

            $row->addEmpty();

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = new Site();
            $hyperlink->site->title = $label;
            //$hyperlink->site->addParameter(new ContentTypeParameter($workflowStatus->contentId));

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addActiveMenu($label)
    {

        $row = new TableRow($this->table);

        new ArrowRightIcon($row);
        $row->addBoldText($label);

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addLogSite(AbstractSite $site)
    {

        $this->addSiteMenu($site, new CheckIcon());

    }


    public function addSiteActiveMenu(AbstractSite $site, $active = false)
    {

        $row = new TableRow($this->table);

        if ($active) {
            new ArrowRightIcon($row);
            $row->addBoldText($site->title);
        } else {

            $row->addEmpty();

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addSubMenu(AbstractSite $site, $active = false)
    {

        $row = new TableRow($this->table);

        if ($active) {
            new ArrowRightIcon($row);
            $row->addBoldText($site->title);
        } else {


            $row->addEmpty();
            //$row->addEmpty();

            $site->title = HtmlCharacter::NON_BREAKING_SPACE . HtmlCharacter::NON_BREAKING_SPACE . HtmlCharacter::NON_BREAKING_SPACE . HtmlCharacter::NON_BREAKING_SPACE . $site->title;

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addNextMenuSite(AbstractSite $site)
    {

        $this->addSiteMenu($site);

    }


    private function addSiteMenu(AbstractSite $site, AbstractFontAwesomeIcon $icon = null, $active = false)
    {

        $row = new TableRow($this->table);

        if ($icon !== null) {
            $row->addContainer($icon);
        } else {
            $row->addEmpty();
        }

        if ($active) {
            //new ArrowRightIcon($row);

            $row->addBoldText($site->title);
        } else {

            //$row->addEmpty();

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    /*
    public function addMenu()
    {

        $row = new TableRow($this->table);
        $row->addEmpty();

        $list = new UnorderedList($row);
        //$list->addCssClass('no-bullet');
        $list->addCssClass('list-unstyled');

        foreach ($this->process->getCurrentStatus()->getMenuSite() as $site) {

            if ($site->isActiveWorkflowStatus()) {
                $list->addText((new ArrowRightIcon())->getHtml() . ' ' . $site->title);
            } else {

                if ($site->workflowStatus->checkUserVisibility()) {

                    $hyperlink = new SiteHyperlink($list);
                    $hyperlink->site = $site;

                } else {

                    $list->addText($site->title);

                }

            }

        }

        $row->addEmpty();
        $row->addEmpty();

        //}

        //}

    }*/


    public function addNextMenu($label)
    {

        $row = new TableRow($this->table);

        $row->addEmpty();
        $row->addText($label);
        $row->addEmpty();
        $row->addEmpty();

    }

}