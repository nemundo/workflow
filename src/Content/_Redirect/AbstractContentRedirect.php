<?php

namespace Nemundo\Workflow\Content\Redirect;


use Nemundo\Core\Base\AbstractDataLoadObject;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Http\Parameter\UrlParameter;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractContentRedirect extends AbstractDataLoadObject
{

    /**
     * @var AbstractSite
     */
    protected $site;

    /**
     * @var AbstractUrlParameter
     */
    protected $paramater;

    /**
     * @var string
     */
    //public $bookmarkId;


    public function getSite($dataId)
    {

        $site = clone($this->site);

        if ($this->paramater !== null) {
            $this->paramater->setValue($dataId);
            $site->addParameter($this->paramater);
        }

        /*if ($this->bookmarkId !== null) {
            $parameter = new UrlParameter('#' . $this->bookmarkId);
            $site->addParameter($parameter);
        }*/

        return $site;

    }


}