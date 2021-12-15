<?php

namespace Derralf\Elements\Textcolumns\Element;

use Derralf\Elements\Textcolumns\Model\ElementTextColumnsItem;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementTextColumnsHolder extends BaseElement
{


    public function getType()
    {
        return self::$singular_name;
    }

    private static $icon = 'font-icon-block-content';

    private static $table_name = 'ElementTextColumnsHolder';

    private static $singular_name = 'Text-Spalten';
    private static $plural_name = 'Text-Spalten';
    private static $description = '';

    private static $db = [
        'HTML'              => 'HTMLText',
    ];


    private static $has_one = [
    ];

    private static $has_many = [
        'TextColumnsItems' => ElementTextColumnsItem::class
    ];

    private static $many_many = [
    ];

    // this adds the SortOrder field to the relation table.
    private static $many_many_extraFields = [
    ];

    private static $belongs_many_many = [];

    private static $owns = [
        //'Teasers'
    ];

    private static $inline_editable = false;

    private static $defaults = [
    ];

    private static $colors = [];


    private static $field_labels = [
        'Title' => 'Titel',
        'Sort' 	=>	'Sortierung'
    ];

    public function updateFieldLabels(&$labels)
    {
        parent::updateFieldLabels($labels);
        $labels['HTML']             = _t(__CLASS__ . '.ContentLabel',    'Content');
        $labels['TextColumnsItems'] = _t(__CLASS__ . '.TextColumnsItemsLabel', 'Textblocks');
    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            // Style: Description for default style (describes Layout thats used, when no special style is selected)
            $Style = $fields->dataFieldByName('Style');
            $StyleDefaultDescription = $this->config()->get('style_default_description', Config::UNINHERITED);
            if ($Style && $StyleDefaultDescription) {
                $Style->setDescription($StyleDefaultDescription);
            }


            // Gridfield erweitern
            if ($this->ID) {
                $TextblocksGridfield = $fields->dataFieldByName('TextColumnsItems');
                $TextblocksGridfieldConfig = $TextblocksGridfield->getConfig();
                $TextblocksGridfieldConfig->removeComponentsByType('GridFieldDeleteAction');
                $TextblocksGridfieldConfig->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $TextblocksGridfieldConfig->addComponent(new GridFieldAddExistingSearchButton());
                $TextblocksGridfieldConfig->addComponent(new GridFieldOrderableRows('Sort'));
            }

        });
        $fields = parent::getCMSFields();

        return $fields;
    }

}
