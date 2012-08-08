<?php
/**
* ownCloud - News app
*
* @author Alessandro Cosentino
* Copyright (c) 2012 - Alessandro Cosentino <cosenal@gmail.com>
*
* This file is licensed under the Affero General Public License version 3 or later.
* See the COPYING-README file
*
*/

// Check if we are a user
OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('news');
OCP\JSON::callCheck();

$userid = OCP\USER::getUser();

$feedid = trim($_POST['feedid']);

$l = OC_L10N::get('news');

$tmpl_items = new OCP\Template("news", "part.items");
$tmpl_items->assign('feedid', $feedid);
$part_items = $tmpl_items->fetchPage();

OCP\JSON::success(array('data' => array( 'message' => $l->t('Feed loaded!'),
										'part_items' => $part_items )));

