<?php

namespace Drupal\commerce_add_to_cart_link;

use Drupal\commerce_product\Entity\ProductVariationInterface;
use Drupal\Core\Access\CsrfTokenGenerator;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Default cart link token service implementation.
 */
class CartLinkToken implements CartLinkTokenInterface {

  /**
   * The module configuration.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * The CSRF token generator.
   *
   * @var \Drupal\Core\Access\CsrfTokenGenerator
   */
  protected $csrfTokenGenerator;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The session.
   *
   * @var \Symfony\Component\HttpFoundation\Session\Session
   */
  protected $session;

  /**
   * Constructs a new CartLinkToken object.
   *
   * @param \Drupal\Core\Access\CsrfTokenGenerator $csrf_token_generator
   *   The CSRF token generator.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   * @param \Symfony\Component\HttpFoundation\Session\Session $session
   *   The request stack.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(CsrfTokenGenerator $csrf_token_generator, AccountInterface $current_user, Session $session, ConfigFactoryInterface $config_factory) {
    $this->config = $config_factory->get('commerce_add_to_cart_link.settings');
    $this->csrfTokenGenerator = $csrf_token_generator;
    $this->currentUser = $current_user;
    $this->session = $session;
  }

  /**
   * {@inheritdoc}
   */
  public function generate(ProductVariationInterface $variation) {
    if (!$this->needsCsrfProtection($this->currentUser)) {
      return '';
    }
    // Ensure that an anonymous user has a session created, as we need to
    // generate a token, which won't work without having a session.
    if ($this->currentUser->isAnonymous() && !$this->session->isStarted()) {
      $this->session->start();
    }
    $this->session->set('forced', TRUE);
    $value = $this->generateTokenValue($variation);
    return $this->csrfTokenGenerator->get($value);
  }

  /**
   * {@inheritdoc}
   */
  public function validate(ProductVariationInterface $variation, $token) {
    if (!$this->needsCsrfProtection($this->currentUser)) {
      return TRUE;
    }
    $value = $this->generateTokenValue($variation);
    return $this->csrfTokenGenerator->validate($token, $value);
  }

  /**
   * {@inheritdoc}
   */
  public function needsCsrfProtection(AccountInterface $account = NULL) {
    if (is_null($account)) {
      $account = $this->currentUser;
    }
    $csrf_protected_roles = $this->config->get('csrf_token.roles');
    if (empty($csrf_protected_roles)) {
      return FALSE;
    }
    return !empty(array_intersect($csrf_protected_roles, $account->getRoles()));
  }

  /**
   * Generates the value used for the token generation.
   *
   * @param \Drupal\commerce_product\Entity\ProductVariationInterface $variation
   *   The product variation.
   *
   * @return string
   *   The value used for the token generation.
   */
  protected function generateTokenValue(ProductVariationInterface $variation) {
    return sprintf('cart_link:%s:%s', $variation->getProductId(), $variation->id());
  }

}
