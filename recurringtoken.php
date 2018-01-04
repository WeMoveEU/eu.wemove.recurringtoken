<?php

require_once 'recurringtoken.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function recurringtoken_civicrm_config(&$config) {
  _recurringtoken_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function recurringtoken_civicrm_xmlMenu(&$files) {
  _recurringtoken_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function recurringtoken_civicrm_install() {
  _recurringtoken_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function recurringtoken_civicrm_postInstall() {
  _recurringtoken_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function recurringtoken_civicrm_uninstall() {
  _recurringtoken_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function recurringtoken_civicrm_enable() {
  _recurringtoken_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function recurringtoken_civicrm_disable() {
  _recurringtoken_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function recurringtoken_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _recurringtoken_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function recurringtoken_civicrm_managed(&$entities) {
  _recurringtoken_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function recurringtoken_civicrm_caseTypes(&$caseTypes) {
  _recurringtoken_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function recurringtoken_civicrm_angularModules(&$angularModules) {
  _recurringtoken_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function recurringtoken_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _recurringtoken_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

function recurringtoken_civicrm_tokens(&$tokens) {
  $tokens['wemoverecurring'] = array(
    'wemoverecurring.amount' => 'Amount of last recurring donation'
  );
}
function recurringtoken_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
  $contacts = implode(',', $cids);
  if (!empty($tokens['wemoverecurring'])) {
    $dao = &CRM_Core_DAO::executeQuery("
    SELECT contact_id, amount FROM civicrm_contribution_recur 
    WHERE contact_id IN ($contacts) ORDER BY start_date DESC LIMIT 1;"
    );
    while ($dao->fetch()) {
      $values[$dao->contact_id] = $dao->amount;
    }
  }
}


/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function recurringtoken_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function recurringtoken_civicrm_navigationMenu(&$menu) {
  _recurringtoken_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'eu.wemove.recurringtoken')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _recurringtoken_civix_navigationMenu($menu);
} // */
