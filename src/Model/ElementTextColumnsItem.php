<?php


namespace Derralf\Elements\Textcolumns\Model;


use Derralf\Elements\Textcolumns\Element\ElementTextColumnsHolder;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\Versioned\Versioned;


class ElementTextColumnsItem extends DataObject
{


    private static $table_name = 'ElementTextColumnsItem';

    private static $singular_name = 'Textblock';
    private static $plural_name = 'Textblocks';
    private static $description = '';


    private static $extensions = [
        Versioned::class
    ];

    private static $db = [
        'Title'   => 'Varchar(255)',
        'Content' => 'HTMLText',
        'Sort'    => 'Int'
    ];

    private static $has_one = [
        'Holder'       => ElementTextColumnsHolder::class,
        'ReadMoreLink' => Link::Class
    ];

    private static $has_many = [
        //'MyOtherDataObjects' => MyOtherDataObject::class
    ];

    private static $many_many = [];

    private static $belongs_many_many = [];

    private static $owns = [
    ];

    private static $defaults = [
    ];

    private static $use_subtitle = false;

    private static $default_sort = 'Sort ASC';

    private static $field_labels = [
        'Title'                   => 'Titel',
        'Content.LimitCharacters' => 'Inhalt',
        'Content'                 => 'Inhalt',
        'ReadMoreLink'            => 'Link',
        'ReadMoreLink.LinkURL'    => 'Link',
        'Sort'                    => 'Sortierung'
    ];

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels['Title']                        = _t(__CLASS__ . '.TitleLabel',        'Title');
        $labels['Content']                      = _t(__CLASS__ . '.ContentLabel',      'Content');
        $labels['Content.LimitCharacters']      = _t(__CLASS__ . '.ContentLabel',      'Content');
        $labels['ReadMoreLink']                 = _t(__CLASS__ . '.ReadMoreLinkLabel', 'ReadMoreLink');
        $labels['ReadMoreLink.LinkURL']         = _t(__CLASS__ . '.ReadMoreLinkLabel', 'ReadMoreLink');
        $labels['Sort']                         = _t(__CLASS__ . '.SortLabel',         'Sort');
        return $labels;
    }


    private static $summary_fields = [
        'Title',
        'Content.LimitCharacters',
        'ReadMoreLink.LinkURL'
    ];

    private static $searchable_fields = [
        'Title'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            // Remove relationship fields
            $fields->removeByName('Sort');

            // Content
            $fields->dataFieldByName('Content')->setRows(8);

            // ReadMoreLink
            $ReadMoreLink = LinkField::create('ReadMoreLinkID', 'Link');
            $fields->replaceField('ReadMoreLinkID', $ReadMoreLink);

        });

        $fields = parent::getCMSFields();
        return $fields;
    }

    /**
     * @return string
     */
    public function ReadmoreLinkClass() {
        return $this->config()->get('readmore_link_class');
    }


    /**
     * @return null
     */
    public function getPage()
    {
        $page = null;

        if ($this->Holder()->exists()) {
            if ($this->Holder()->hasMethod('getPage')) {
                $page = $this->Holder()->getPage();
            }
        }
        return $page;

    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param Member $member
     * @return boolean
     */
    public function canView($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->getPage()) {
            return $page->canView($member);
        }

        return (Permission::check('CMS_ACCESS', 'any', $member)) ? true : null;
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param Member $member
     *
     * @return boolean
     */
    public function canEdit($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->getPage()) {
            return $page->canEdit($member);
        }

        return (Permission::check('CMS_ACCESS', 'any', $member)) ? true : null;
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * Uses archive not delete so that current stage is respected i.e if a
     * element is not published, then it can be deleted by someone who doesn't
     * have publishing permissions.
     *
     * @param Member $member
     *
     * @return boolean
     */
    public function canDelete($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->getPage()) {
            return $page->canArchive($member);
        }

        return (Permission::check('CMS_ACCESS', 'any', $member)) ? true : null;
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param Member $member
     * @param array $context
     *
     * @return boolean
     */
    public function canCreate($member = null, $context = array())
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        return (Permission::check('CMS_ACCESS', 'any', $member)) ? true : null;
    }




}
