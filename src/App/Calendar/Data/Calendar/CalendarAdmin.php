<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
use Nemundo\Package\Bootstrap\Admin\BootstrapModelAdmin;
use Nemundo\Web\Action\ActionUrl;
use Nemundo\Com\Html\Basic\H3;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Model\Admin\Redirect\ModelDeleteRedirect;
use Nemundo\Model\Admin\Redirect\ModelEditRedirect;
use Nemundo\Web\Http\HttpRequest;
class CalendarAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  CalendarModel();
}
}