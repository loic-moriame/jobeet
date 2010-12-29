<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     loïc moriamé
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JobeetJobForm extends BaseJobeetJobForm
{

  public function configure()
  {
    unset(
            $this['created_at'], $this['updated_at'],
            $this['expires_at'], $this['is_activated'],
            $this['token']
    );

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
                $this->validatorSchema['email'],
                new sfValidatorEmail(),
            ));

    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
                'choices' => Doctrine_Core::getTable('JobeetJob')->getTypes(),
                'expanded' => true,
            ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
                'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
            ));

    $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
                'label' => 'Company logo',
            ));
    $this->validatorSchema['logo'] = new sfValidatorFile(array(
                'required' => false,
                'path' => sfConfig::get('sf_upload_dir') . '/jobs',
                'mime_types' => 'web_images',
            ));

    $this->widgetSchema->setLabels(array(
        'category_id' => 'Category',
        'is_public' => 'Public?',
        'how_to_apply' => 'How to apply?',
    ));

    $this->widgetSchema->setHelp('is_public', 'Whether the job can also be published on affiliate websites or not.');
  }

}
