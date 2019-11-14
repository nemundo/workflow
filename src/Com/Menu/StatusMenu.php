<?php

namespace Nemundo\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;


// ProcedureMenu
class StatusMenu extends AbstractRestrictedUserHtmlContainer
{

    /**
     * @var AdminTable
     */
    private $table;

    protected function loadContainer()
    {
        $this->table = new AdminTable($this);
    }



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

    }


    public function addActiveMenu($label)
    {

        $row = new TableRow($this->table);

        new ArrowRightIcon($row);
        $row->addBoldText($label);

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addEmptyMenu()
    {

        $row = new TableRow($this->table);
        $row->addEmpty();
        $row->addEmpty();
        $row->addEmpty();
        $row->addEmpty();

    }


    public function addCheckIconActiveMenu($label)
    {

        $row = new TableRow($this->table);

        new CheckIcon($row);
        $row->addBoldText($label);

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addCheckIconSite(AbstractSite $site)
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


    public function addSite(AbstractSite $site)
    {

        $this->addSiteMenu($site);

    }


  public function addSiteMenu(AbstractSite $site, AbstractFontAwesomeIcon $icon = null, $active = false)
    {

        $row = new TableRow($this->table);

        if ($icon !== null) {
            $row->addContainer($icon);
        } else {
            $row->addEmpty();
        }

        if ($active) {

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;
            $hyperlink->showSiteTitle=false;

            $bold= new Bold($hyperlink);
            $bold->content = $site->title;

        } else {

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

        }

        $row->addEmpty();
        $row->addEmpty();

    }





    public function addNextMenu($label)
    {

        $row = new TableRow($this->table);

        $row->addEmpty();
        $row->addText($label);
        $row->addEmpty();
        $row->addEmpty();

    }

}