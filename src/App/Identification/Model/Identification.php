<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;

class Identification extends AbstractBase
{

    /**
     * @var AbstractIdentificationType
     */
    public $identificationType;

    /**
     * @var string
     */
    public $identificationId;


    public function getValue()
    {

        $value = '';
        if ($this->identificationType !== null) {
            $value = $this->identificationType->getValue($this->identificationId);
        }

        return $value;

    }


    public function setUserIdentification($userId)
    {

        $this->identificationType = new UserIdentificationType();
        $this->identificationId = $userId;

    }


    public function setUsergroupIdentification(AbstractUsergroup $usergroup)
    {

        $this->identificationType = new UsergroupIdentificationType();
        $this->identificationId = $usergroup->id;

    }


}