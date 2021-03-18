# Workflow Framework

# Was wird noch genutzt?
- App/UserConfig




### Installation

```
git submodule add https://github.com/nemundo/workflow.git lib/workflow
```


### App Designer Setup
```
(new \Nemundo\Workflow\Install\WorkflowAppDesignerInstall())->run();

(new WorkflowInstall())->run();

```

### config.php
```
$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/workflow/src/';
$lib->namespace = 'Nemundo\\Workflow';
```