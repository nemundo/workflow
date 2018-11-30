<?php

namespace Nemundo\Workflow\App\Workflow\Controller;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Com\ChildContentViewContainer;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Dev\Deployment\StagingEnvironment;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Com\Menu\WorkflowStatusMenu;
use Nemundo\Workflow\App\Workflow\Com\Table\WorkflowHistoryTable;
use Nemundo\Workflow\App\Workflow\Com\Table\WorkflowLogTable;

class WorkflowController extends AbstractBase
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;


    public function __construct(AbstractWorkflowProcess $process = null)
    {
        $this->process = $process;
    }


    public function getFormStatus()
    {

        $this->check();

        $formStatus = null;

        $status = $this->process->getStatus();
        if ($status !== null) {

            if ($status->isDraft()) {
                $formStatus = $status;
            }

            $contentTypeParameter = new ContentTypeParameter();
            if ($contentTypeParameter->exists()) {

                $formStatus = $contentTypeParameter->getContentType();
                $formStatus->parentContentType = $this->process;

            } else {

                if (!$status->isDraft()) {
                    $nextStatus2 = $status->getNextContentType();

                    if ($nextStatus2 !== null) {
                        $formStatus = $nextStatus2;
                    }
                }

            }

        }

        return $formStatus;

    }


    public function getForm($parentItem = null)
    {

        $formStatus = $this->getFormStatus();
        $form = null;

        if ($this->process->dataId !== null) {

            if ($formStatus !== null) {

                if ($formStatus->checkUserVisibility()) {

                    $title = new AdminSubtitle($parentItem);
                    $title->content = $formStatus->contentLabel;

                    $form = $formStatus->getForm($parentItem);
                    $form->parentContentType = $this->process;
                    $form->redirectSite = new Site();
                    $form->redirectSite->removeParameter(new ContentTypeParameter());

                }

            }

        } else {

            $form = $this->process->getForm($parentItem);
            $form->parentContentType = $this->process;
            $form->redirectSite = new Site();
            $form->redirectSite->removeParameter(new ContentTypeParameter());

        }

        return $form;

    }


    public function getTitle($parentItem = null)
    {

        $this->check();
        $title = new AdminTitle($parentItem);
        $title->content = $this->process->getSubject();


        return $title;

    }


    public function getMenu($parentItem = null)
    {

        $this->check();

        $menu = new WorkflowStatusMenu($parentItem);
        $menu->process = $this->process;
        $menu->formStatus = $this->getFormStatus();

        return $menu;


    }


    public function getLogView($parentItem = null)
    {

        $view = new ChildContentViewContainer($parentItem);
        $view->contentType = $this->process;
        return $view;

    }


    public function getHistoryTable($parentItem = null)
    {

        $table = new WorkflowHistoryTable($parentItem);
        $table->process = $this->process;
        return $table;

    }


    public function getLogTable($parentItem = null)
    {

        $log = null;

        if (DeploymentConfig::$stagingEnviroment == StagingEnvironment::DEVELOPMENT) {

            $log = new WorkflowLogTable($parentItem);
            $log->process = $this->process;

            $title = new AdminSubtitle($parentItem);
            $title->content = 'Status';

            if ($this->process->dataId !== null) {

                $table = new AdminLabelValueTable($parentItem);
                $table->addLabelValue('Status', $this->process->getStatus()->contentLabel);
                $table->addLabelValue('Subject', $this->process->getSubject());
                $table->addLabelYesNoValue('Closed', $this->process->isWorkflowClosed());

                $nextSatus = $this->process->getNextContentType();
                if ($nextSatus !== null) {
                    $table->addLabelValue('Next Status', $nextSatus->contentLabel);
                }


                $parent = $this->process->getParent();
                if ($parent !== null) {

                    $table->addLabelValue('Parent', $parent->contentLabel);

                    $site = $parent->getViewSite();
                    $site->title = $parent->getSubject();
                    $table->addLabelSite('Parent Item', $site);

                }

            }

        }

        return $log;

    }


    protected function check()
    {

        $this->checkObject('process', $this->process, AbstractWorkflowProcess::class);

    }


}