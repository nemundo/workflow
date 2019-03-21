<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractExcelSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Excel Export';
        $this->url = 'excel-export';

        parent::__construct($site);

        $this->icon->icon = 'file-excel';
        $this->icon->iconSize = 2;

    }

}