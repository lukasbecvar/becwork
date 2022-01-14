<?php //The Example app controller

	require_once("../framework/app/models/ExampleModel.php");

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