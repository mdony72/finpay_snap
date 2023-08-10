<?php
/**
 * Finpay Configuration
 */
class Finpay_Config {

  /**
   * Your merchant's secret key
   * @static
   */
  public static $username;

   /**
   * Your merchant's password
   * @static
   */
  public static $password;

  /**
   * Your merchant's secret key
   * @static
   */
  public static $secretKey;

   /**
   * true for production
   * false for sandbox mode
   * @static
   */
  public static $isProduction = false;

  const SNAP_SANDBOX_BASE_URL = 'https://sandbox.finpay.co.id/servicescode/api/apiFinpay.php';
  const SNAP_PRODUCTION_BASE_URL = 'https://billhosting.finpay.id/prepaidsystem/api/apiFinpay.php';

  /**
   * @return bool Finpay API URL, depends on $isProduction
   */
  public static function getBaseUrl()
  {
    return Finpay_Config::$isProduction ? Finpay_Config::SANDBOX_BASE_URL : Finpay_Config::SANDBOX_BASE_URL;
  }

  /**
   * @return string Snap API URL, depends on $isProduction
   */
  public static function getSnapBaseUrl()
  {
    return Finpay_Config::$isProduction ? Finpay_Config::SNAP_PRODUCTION_BASE_URL : Finpay_Config::SNAP_SANDBOX_BASE_URL;
  }
}
