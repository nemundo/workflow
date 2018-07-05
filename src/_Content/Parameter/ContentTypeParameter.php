<?php

namespace Nemundo\App\Content\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class ContentTypeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'content-type';
    }

}