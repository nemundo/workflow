<?php

namespace Nemundo\Workflow\App\Favorite\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class FavoriteParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'favorite';
    }
}