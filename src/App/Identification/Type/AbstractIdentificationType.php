<?php

namespace Nemundo\Workflow\App\Identification\Type;

// Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Filter\Filter;

abstract class AbstractIdentificationType extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $identification;

    abstract protected function loadIdentification();

    //abstract public function getFilter(Filter $filter);

    abstract public function getValue($identificationId);

    abstract public function getIdentificationIdList();


    public function __construct()
    {
        $this->loadIdentification();
    }


    // getSite --> für Mitglieder


}