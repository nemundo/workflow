<?php
namespace Nemundo\Workflow\App\Notification\Install;
use Nemundo\Dev\Script\AbstractScript;
class NotificationInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "notification-install";
$this->consoleScript= true;
}
public function run() {
}
}