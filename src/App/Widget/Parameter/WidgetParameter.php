<?php
namespace Nemundo\Workflow\App\Widget\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class WidgetParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'widget';
}
}