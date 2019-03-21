<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractClearSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Filterung zurücksetzen';
        $this->url = 'clear-filter';

        parent::__construct($site);

        $this->icon->icon = 'times';
        $this->icon->iconSize = 3;

    }

}