<?php
	class Session {
		public function start() {
			session_start();
		}

		public function send($usr) {
			$_SESSION['usr'] = $usr;
		}

		public function get() {
			if (isset($_SESSION['usr'])) {
				$usr = $_SESSION['usr'];
			}
			else {
				$usr = '';
			}
			return $usr;
		}

		public function destroy() {
			session_destroy();
		}
	}
?>