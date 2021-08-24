<?php

require_once 'primaryexportdisable.civix.php';
// phpcs:disable
use CRM_Primaryexportdisable_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function primaryexportdisable_civicrm_config(&$config) {
  _primaryexportdisable_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function primaryexportdisable_civicrm_xmlMenu(&$files) {
  _primaryexportdisable_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function primaryexportdisable_civicrm_install() {
  _primaryexportdisable_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function primaryexportdisable_civicrm_postInstall() {
  _primaryexportdisable_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function primaryexportdisable_civicrm_uninstall() {
  _primaryexportdisable_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function primaryexportdisable_civicrm_enable() {
  _primaryexportdisable_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function primaryexportdisable_civicrm_disable() {
  _primaryexportdisable_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function primaryexportdisable_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _primaryexportdisable_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function primaryexportdisable_civicrm_managed(&$entities) {
  _primaryexportdisable_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function primaryexportdisable_civicrm_caseTypes(&$caseTypes) {
  _primaryexportdisable_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function primaryexportdisable_civicrm_angularModules(&$angularModules) {
  _primaryexportdisable_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function primaryexportdisable_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _primaryexportdisable_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function primaryexportdisable_civicrm_entityTypes(&$entityTypes) {
  _primaryexportdisable_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function primaryexportdisable_civicrm_themes(&$themes) {
  _primaryexportdisable_civix_civicrm_themes($themes);
}

function primaryexportdisable_civicrm_buildForm($formName, $form) {
  if ($form instanceof CRM_Export_Form_Select) {
    $form->setDefaults(['exportOption' => CRM_Export_Form_Select::EXPORT_SELECTED]);
    $exportOptionElements = $form->getElement('exportOption')->getElements();
    foreach ($exportOptionElements as $exportOption) {
      if ($exportOption->getValue() == CRM_Export_Form_Select::EXPORT_ALL) {
        $exportOption->setAttribute('disabled');
        $exportOption->setText(E::ts('%1', [1 => Civi::settings()->get('primary_export_disable_message')]));
      }
    }
  }
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function primaryexportdisable_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
function primaryexportdisable_civicrm_navigationMenu(&$menu) {
  _primaryexportdisable_civix_insert_navigation_menu($menu, 'Administer/Customize Data and Screens', [
    'label' => E::ts('Primary Export Disable Extension Settings'),
    'name' => 'primary_export_disable_settings',
    'url' => 'civicrm/admin/setting/primaryexportdisable',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ]);
  _primaryexportdisable_civix_navigationMenu($menu);
}
