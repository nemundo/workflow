<?php

namespace Nemundo\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\AbstractSite;


// ProcedureMenu
class StatusMenu extends AbstractRestrictedUserHtmlContainer
{

    /**
     * @var AdminTable
     */
    private $table;


    private $activeFound = false;

    protected function loadContainer()
    {
        $this->table = new AdminTable($this);
    }


    /*
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

            }

            $row->addEmpty();
            $row->addEmpty();

        }*/


    public function addMenuItem(MenuItem $menuItem)
    {

        if ($menuItem->active) {
            $this->addActiveMenu($menuItem->label);
        }

        if (!$menuItem->linked && !$menuItem->active) {
            $this->addLabel($menuItem->label);
        }

        if ($menuItem->linked && !$menuItem->active) {
            $menuItem->site->title = $menuItem->label;
            $this->addSite($menuItem->site);
        }

    }


    private function addActiveMenu($label)
    {

        $this->activeFound=true;

        $row = new TableRow($this->table);

        new ArrowRightIcon($row);
        $row->addBoldText($label);

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addEmptyMenu()
    {

        $row = new TableRow($this->table);
        $row->addEmpty()
            ->addEmpty()
            ->addEmpty()
            ->addEmpty();

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


    private function addSite(AbstractSite $site)
    {

        $row = new TableRow($this->table);

        if (!$this->activeFound) {
            //new ArrowRightIcon($row);
            new CheckIcon($row);

        } else {
            $row->addEmpty();
        }

        $hyperlink = new SiteHyperlink($row);
        $hyperlink->site = $site;

        $row->addEmpty();
        $row->addEmpty();

    }


    private function addLabel($label)
    {

        $row = new TableRow($this->table);

        //$row->addEmpty();

        if (!$this->activeFound) {
            //new ArrowRightIcon($row);
            new CheckIcon($row);
        } else {
            $row->addEmpty();
        }

        $row->addText($label);
        $row->addEmpty();
        $row->addEmpty();

    }

}