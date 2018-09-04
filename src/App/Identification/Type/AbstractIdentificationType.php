<?php

namespace Nemundo\Workflow\App\Identification\Type;

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

    abstract public function getValue($identificationId);

    abstract public function getUserIdList();


    public function __construct()
    {
        $this->loadIdentification();
    }

}