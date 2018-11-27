<?php

namespace Nemundo\Workflow\App\Favorite\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class FavoriteParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'favorite';
    }
}