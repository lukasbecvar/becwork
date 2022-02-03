<?php //The Example app controller

	//Include basic example struct model
	require_once(__DIR__."/../../models/ExampleModel.php");

	class ExampleController {

		public function getNameValue() {
			return ExampleModel::$data["name"];
		}

		public function getPasswordValue() {
			return ExampleModel::$data["password"];
		}

		public function getOnlineValue() {
			return ExampleModel::$data["online"];
		}
	}

?>