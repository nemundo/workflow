<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class TrashParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'trash';
    }

}