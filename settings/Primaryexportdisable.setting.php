<?php
use CRM_Primaryexportdisable_ExtensionUtil as E;
/*
 * Settings metadata file
 */
return [
  'primary_export_disable_message' => [
    'group_name' => 'Primary Export Disable Settings',
    'group' => 'primaryexportdisable',
    'name' => 'primary_export_disable_message',
    'type' => 'String',
    'html_type' => 'text',
    'title' => E::ts('Primary Export Disable Message'),
    'default' => E::ts('Export PRIMARY fields - sorry this option has been disabled due to performance issues.  Please choose the data you wish to export instead.'),
    'add' => '4.3',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => E::ts('Text to display instead of the primary export option'),
    'settings_pages' => ['primaryexportdisable' => ['weight' => 10]],
  ],
];
