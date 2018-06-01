<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Install;
use Nemundo\Dev\Script\AbstractScript;
class WorkflowTemplateInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "workflow_template-install";
$this->consoleScript= true;
}
public function run() {
}
}