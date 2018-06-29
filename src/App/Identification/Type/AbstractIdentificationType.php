<?php

namespace Nemundo\Workflow\App\Identification\Type;

// Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;

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

    abstract public function getFilter();

    abstract public function getValue($identificationId);


    public function __construct()
    {
        $this->loadIdentification();
    }

}