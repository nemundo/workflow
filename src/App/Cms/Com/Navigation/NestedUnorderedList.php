<?php

namespace Nemundo\Workflow\App\Cms\Com\Navigation;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;

// CmsNavigation
// Wird verwendet in: Weihnachtszeit
class NestedUnorderedList extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $site;


    public $unorderedListCssClass = '';

    /**
     * @var string
     */
    public $activeCssClass = '';


    public function getHtml()
    {

        $this->addMenu($this->site, $this);

        return parent::getHtml();

    }


    private function addMenu(AbstractSiteTree $site, AbstractHtmlContainerList $com)
    {

        $list = new UnorderedList($com);
        $list->addCssClass($this->unorderedListCssClass);

        foreach ($site->getSiteList() as $subSite) {

            //if ($subSite->isCurrentSite()) {
            if ($subSite->menuActive) {
                $li = new Li($list);

                $link = new SiteHyperlink($li);
                $link->site = $subSite;

                if ($subSite->isCurrentSite() || $subSite->isChildMenuActive()) {
                    $link->addCssClass($this->activeCssClass);

                    if ($subSite->hasItems()) {
                        $this->addMenu($subSite, $li);
                    }

                }
            }

        }

    }

}