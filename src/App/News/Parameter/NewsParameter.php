<?php
namespace Nemundo\Workflow\App\News\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class NewsParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'news';
}
}