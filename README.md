# SilverStripe Elemental Textcolumns
A simple content block to display text in columns  
(private project, no help/support provided)

## Requirements

* SilverStripe ^4.2
* dnadesign/silverstripe-elemental ^4.0
* sheadawson/silverstripe-linkable ^2.0@dev

## Suggestions
* derralf/elemental-styling

Modify `/templates/Derralf/Elements/Textcolumns/Includes/Title.ss` to your needs when using StyledTitle from derralf/elemental-styling.


## Installation

- Install the module via Composer
  ```
  composer require derralf/elemental-textcolumns
  ```

## Configuration

A basic/default config. Add this to your **mysite/\_config/elements.yml**

Note the example options for `colors`, for which NO styles are included in the default style sheet.

```

---
Name: elementaltextcolumns
After: 'elemental-textcolumns'
---
Derralf\Elements\Textcolumns\Element\ElementTextColumnsHolder:
  # disable StyledTitle
  title_tag_variants: null
  title_alignment_variants: null
  # styles
  style_default_description: 'Standard: 3 Spalten'
  styles:
    TwoColumns: '2 Spalten'
    TitleLeftTextRight: 'Titel links, Text rechts'
Derralf\Elements\Textcolumns\Model\ElementTextColumnsItem:
  readmore_link_class: 'btn btn-primary btn-readmore'
```

Additionally you may apply the default styles:

```
# add default styles
DNADesign\Elemental\Controllers\ElementController:
  default_styles:
    - derralf/elemental-textcolumns:client/dist/styles/frontend-default.css
```

See Elemental Docs for [how to disable the default styles](https://github.com/dnadesign/silverstripe-elemental#disabling-the-default-stylesheets).

### Adding your own templates

You may add your own templates/styles like this:

```
Derralf\Elements\Textcolumns\Element\ElementTextColumnsHolder
  styles:
    MyCustomTemplate: "new customized special Layout"
```

...and put a template named `ElementTextColumnsHolder_MyCustomTemplate.ss`in `themes/{your_theme}/templates/Derralf/Elements/Textcolumns/Element/`  
**and/or**
add styles for `.derralf__elements__textcolumns__element__elementtextcolumnsholder.mycustomtemplate` to your style sheet.  


## Template Notes

Templates based on Bootstrap 3+, but may need some extra styling

- Optionaly, you can require basic CSS stylings provided with this module to your controller class like **mysite/code/PageController.php**  (or add these styles in your config yaml, see above)
  
  ```
  Requirements::css('derralf/elemental-textcolumns:client/dist/styles/frontend-default.css');
  ```
- or copy over and modify `client/src/styles/frontend-default.scss` in your theme scss 

## Screen Shots

(not available)

