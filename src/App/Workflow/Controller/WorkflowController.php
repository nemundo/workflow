<?php

namespace Nemundo\Workflow\App\Workflow\Controller;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Workflow\Com\Menu\WorkflowStatusMenu;

class WorkflowController extends AbstractBase
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;


    public function getFormStatus()
    {

        $this->check();

        $formStatus = null;


        //if ($this->process->isWorkflowOpen()) {

            $status = $this->process->getStatus();
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
        //}

        return $formStatus;

    }


    public function getForm($parentItem = null)
    {

        $formStatus = $this->getFormStatus();

        if ($formStatus !== null) {

            if ($formStatus->checkUserVisibility()) {

                $title = new AdminSubtitle($parentItem);
                $title->content = $formStatus->contentName;

                $form = $formStatus->getForm($parentItem);
                $form->parentContentType = $this->process;
                $form->redirectSite = $this->process->getViewSite();

            }

        }

    }


    public function getTitleCom($parentItem = null)
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


    protected function check()
    {

        $this->checkObject('process', $this->process, AbstractWorkflowProcess::class);

    }


}