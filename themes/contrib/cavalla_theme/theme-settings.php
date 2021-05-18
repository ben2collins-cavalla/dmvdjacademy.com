<?php
/**
 * @file
 * Cavalla, add custom theme settings options here.
 */

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function cavalla_theme_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {

/*   $form['cavalla_menu_settings'] = array(
    '#type' => 'details',
    '#title' => t('Navigation Menu Display Settings'),
  );

  $form['cavalla_menu_settings']['menu_display'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navigation Menu Displays'),
    '#weight' => 100,
    '#collapsible' => true,
    '#collapsed' => true,
  );

  $form['cavalla_menu_settings']['menu_display']['menu_display_variations'] = array(
    '#type' => 'select',
    '#options' => [
      'navigation menu display'=>t('select'),    
      'hamburger' => t('Hamburger'),
      'traditional' => t('Traditional'),
      'centered' => t('Centered Nav'),
    ],
    '#title' => t('Navigtion Menu Display'),
    '#default_value' => theme_get_setting('navbar'),
    '#description' => t("Choose how to display the site's navigtion menu"),
  ); */

  // Footer
  $form['cavalla_footer_settings'] = array(
    '#type' => 'details',
    '#title' => t('Footer Settings'),
  );
  // Social media
  $form['cavalla_footer_settings']['social_links'] = array(
    '#type' => 'details',
    '#title' => t('Social Links'),
    '#weight' => 100,
    '#collapsible' => true,
    '#collapsed' => true,
  );
  $form['cavalla_footer_settings']['social_links']['twitter_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Link'),
    '#default_value' => theme_get_setting('twitter_link'),
    '#description' => t('Add the URL to your twitter profile.'),
  );
  $form['cavalla_footer_settings']['social_links']['facebook_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Link'),
    '#default_value' => theme_get_setting('facebook_link'),
    '#description' => t('Add the URL to your facebook profile.'),
  );
  $form['cavalla_footer_settings']['social_links']['youtube_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Youtube Link'),
    '#default_value' => theme_get_setting('youtube_link'),
    '#description' => t('Add the URL to your youtube profile.'),
  );
  $form['cavalla_footer_settings']['social_links']['instagram_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Instagram Link'),
    '#default_value' => theme_get_setting('instagram_link'),
    '#description' => t('Add the URL to your instagram profile.'),
  );
  $form['cavalla_footer_settings']['social_links']['linkedin_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Linkedin Link'),
    '#default_value' => theme_get_setting('linkedin_link'),
    '#description' => t('Add the URL to your Linkedin profile.'),
  );
  // Address/contact
  $form['cavalla_footer_settings']['address'] = array(
    '#type' => 'details',
    '#title' => t('Address'),
    '#weight' => 100,
    '#collapsible' => true,
    '#collapsed' => true,
  );
  $form['cavalla_footer_settings']['address']['address_organization_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Organization Name'),
    '#default_value' => theme_get_setting('address_organization_name'),
    '#description' => t("Add your organization's name."),
  );
  $form['cavalla_footer_settings']['address']['address_street'] = array(
    '#type' => 'textfield',
    '#title' => t('Street'),
    '#default_value' => theme_get_setting('address_street'),
    '#description' => t('Add your address.'),
  );
  $form['cavalla_footer_settings']['address']['address_city_state_zipcode'] = array(
    '#type' => 'textfield',
    '#title' => t('City, State and Zipcode'),
    '#default_value' => theme_get_setting('address_city_state_zipcode'),
    '#description' => t('Add you city, state and zipcode.'),
  );
  $form['cavalla_footer_settings']['address']['address_phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Phone'),
    '#default_value' => theme_get_setting('address_phone'),
    '#description' => t('Add a phone number.'),
  );
  $form['cavalla_footer_settings']['address']['address_email'] = array(
    '#type' => 'textfield',
    '#title' => t('E-mail'),
    '#default_value' => theme_get_setting('address_email'),
    '#description' => t('Add your e-mail.'),
  );

}

