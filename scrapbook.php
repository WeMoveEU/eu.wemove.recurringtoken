<?php
/**
 * Created by PhpStorm.
 * User: michau
 * Date: 11.12.17
 * Time: 13:57
 */

function hook_civicrm_tokens(&$tokens) {
  $tokens['wemoverecurring'] = array(
    'wemoverecurring.amount' => 'Amount of last recurring donation'
  );
}

function hook_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
  $contacts = implode(',', $cids);

  if (!empty($tokens['wemoverecurring'])) {
    $dao = &CRM_Core_DAO::executeQuery("
    SELECT contact_id, amount FROM civicrm_contribution_recur 
    WHERE contact_id IN ($contacts) ORDER IN start_date DESC LIMIT 1;"
    );

    while ($dao->fetch()) {
      $values[$dao->contact_id] = $dao->amount;
    }
  }
}