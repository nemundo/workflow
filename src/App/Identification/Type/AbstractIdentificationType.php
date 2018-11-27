<?php

namespace Nemundo\Workflow\App\Identification\Type;

use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractIdentificationType extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $identificationId;

    /**
     * @var string
     */
    public $identification;


    abstract protected function loadIdentification();

    // getText
    abstract public function getValue($identificationId);

    abstract public function getUserIdListFromIdentificationId($identificationId);

    abstract public function getUserIdList();

    abstract public function getIdentificationIdFromUserId($userId);


    public function getSite($identificationId)
    {
        return null;
    }


    public function __construct()
    {
        $this->loadIdentification();
    }

}