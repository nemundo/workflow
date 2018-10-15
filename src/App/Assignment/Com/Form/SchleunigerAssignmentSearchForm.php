<?php

namespace Nemundo\Workflow\App\Assignment\Com\Form;


use Nemundo\App\Content\Data\ContentType\ContentTypeListBox;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\ClosedListBoxItem;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentModel;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\App\Workflow\Com\ListBox\OpenClosedWorkflowListBox;
use Schleuniger\App\Org\Com\MitarbeiterListBox;

class AssignmentSearchForm extends SearchForm
{

    /**
     * @var MitarbeiterListBox
     */
    private $mitarbeiterListBox;

    /**
     * @var OpenClosedWorkflowListBox
     */
    private $status;

    /**
     * @var MitarbeiterListBox
     */
    private $ersteller;

    /**
     * @var ContentTypeListBox
     */
    private $source;


    public function loadCom()
    {
        parent::loadCom();

        $row = new BootstrapFormRow($this);

        $this->mitarbeiterListBox = new MitarbeiterListBox($row);
        $this->mitarbeiterListBox->loggedUserAsDefaultValue = true;
        $this->mitarbeiterListBox->value = $this->mitarbeiterListBox->getValue();
        $this->mitarbeiterListBox->submitOnChange = true;

        $this->status = new OpenClosedWorkflowListBox($row);
        $this->status->submitOnChange = true;

        $this->ersteller = new MitarbeiterListBox($row);
        $this->ersteller->label = 'Ersteller';
        $this->ersteller->value = $this->ersteller->getValue();
        $this->ersteller->submitOnChange = true;

        $this->source = new ContentTypeListBox($row);
        $this->source->value = $this->source->getValue();
        $this->source->submitOnChange = true;


    }


    public function getFilter()
    {

        $model = new AssignmentModel();
        $filter = new Filter();

        $userId = $this->mitarbeiterListBox->getValue();
        if ($userId !== '') {
            $mitarbeiterFilter = new Filter();
            foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                foreach ($identification->getIdentificationIdFromUserId($userId) as $value) {
                    $mitarbeiterFilter->orEqual($model->assignment->identificationId, $value);
                }

            }

            $filter->andFilter($mitarbeiterFilter);
        }


        if ($this->status->getValue() == (new OpenListBoxItem())->id) {
            $filter->andEqual($model->archive, false);
        }

        if ($this->status->getValue() == (new ClosedListBoxItem())->id) {
            $filter->andEqual($model->archive, true);
        }


        $ersteller = $this->ersteller->getValue();
        if ($ersteller !== '') {
            $filter->andEqual($model->userCreatedId, $ersteller);
        }

        $source = $this->source->getValue();
        if ($source !== '') {
            $filter->andEqual($model->contentTypeId, $source);
        }


        return $filter;

    }

}