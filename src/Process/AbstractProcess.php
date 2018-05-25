<?php

namespace Schleuniger\Workflow\Process;

use Nemundo\Dev\Application\Type\AbstractApplication;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;


abstract class AbstractProcess extends AbstractApplication
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;

    /**
     * @var string
     */
    public $prefix;

    /**
     * @var string
     */
    public $baseModelClassName;



    public function getApplicationSite($dataId=null) {

        $site = clone($this->site);
        $site->addParameter( $this->parameter->setValue($dataId));

        return $site;

    }

}