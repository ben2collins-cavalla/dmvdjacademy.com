<?php

namespace Drupal\commerce_cart_redirection\Form;

use Drupal\Core\Entity\EntityTypeBundleInfo;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Config\ConfigManagerInterface;

/**
 * Class CommerceCartRedirectionConfigForm.
 */
class CommerceCartRedirectionConfigForm extends ConfigFormBase {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
  /**
   * Drupal\Core\Config\ConfigManagerInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;

  /**
   * Drupal\Core\Entity\EntityTypeBundleInfo.
   *
   * @var \Drupal\Core\Entity\EntityTypeBundleInfo
   */
  protected $entityTypeBundleInfo;

  /**
   * CommerceCartRedirectionConfigForm constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   EntityTypeManagerInterface.
   * @param \Drupal\Core\Config\ConfigManagerInterface $config_manager
   *   ConfigManagerInterface.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfo $entity_type_bundle_info
   *   EntityTypeBundleInfo.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, ConfigManagerInterface $config_manager, EntityTypeBundleInfo $entity_type_bundle_info) {
    $this->entityTypeManager = $entity_type_manager;
    $this->configManager = $config_manager;
    $this->entityTypeBundleInfo = $entity_type_bundle_info;
  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return \Drupal\commerce_cart_redirection\Form\CommerceCartRedirectionConfigForm|\Drupal\Core\Form\FormBase
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('config.manager'),
      $container->get('entity_type.bundle.info')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'commerce_cart_redirection_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'commerce_cart_redirection.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // @NOTE due to an error in using commerce_product bundles in place of
    // commerce_product_variation bundles the config values are now misnamed
    // and should be fixed to be product_variation_bundles etc at some point.
    // Load all bundle types for commerce_product_variation.
    // @TODO This means the redirect won't work for entities that implement
    // purchasable but aren't commerce_product_variation(s) Fix?
    $config = $this->config('commerce_cart_redirection.settings');
    $options = [];
    $bundles = $this->entityTypeBundleInfo->getBundleInfo('commerce_product_variation');
    foreach ($bundles as $key => $bundle) {
      $options[$key] = $bundle['label'];
    }

    $form['product_bundles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Product Variation Bundles'),
      '#description' => $this->t('Select the product variation bundles you want to redirect to Checkout on Add To Cart'),
      '#weight' => '0',
      '#options' => $options,
      '#default_value' => $config->get('product_bundles'),
    ];
    $form['negate_product_bundles'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Negate the Bundles condition'),
      '#default_value' => $config->get('negate_product_bundles'),
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $config = $this->config('commerce_cart_redirection.settings');
    $config->set('product_bundles', $values['product_bundles']);
    $config->set('negate_product_bundles', $values['negate_product_bundles']);
    $config->save();
  }

}
