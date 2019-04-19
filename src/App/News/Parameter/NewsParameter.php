<?php

namespace Nemundo\Workflow\App\News\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class NewsParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'news';
    }
}