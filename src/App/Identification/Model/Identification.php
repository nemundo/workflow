<?php

namespace Nemundo\Workflow\App\Identification\Model;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

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


}