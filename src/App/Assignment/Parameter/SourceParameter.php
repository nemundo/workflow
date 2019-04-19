<?php
namespace Nemundo\Workflow\App\Assignment\Parameter;
use Nemundo\Web\Http\Parameter\AbstractGetParameter;
class SourceParameter extends AbstractGetParameter {
protected function loadParameter() {
$this->parameterName = 'source';
}
}
