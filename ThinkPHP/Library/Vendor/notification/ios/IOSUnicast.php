<?php
require_once('/ThinkPHP/Library/Vendor/notification/IOSNotification.php');

class IOSUnicast extends IOSNotification {
	function __construct() {
		parent::__construct();
		$this->data["type"] = "unicast";
		$this->data["device_tokens"] = NULL;
	}

}