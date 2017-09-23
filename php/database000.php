<?php
	class Database {
		private $hostname = "localhost",
				$username = "id3004082_root",
				$passwword = "shaman12",
				$dbname = "id3004082_gaugaudb";
		public $conn = NULL;

		public function connect() {
			$this->conn = new mysqli($this->hostname, $this->username, $this->passwword, $this->dbname);
		}

		public function close() {
			if ($this->conn) {
				$this->conn->close();
			}
		}

		public function query($sql) {
			if ($this->conn) {
				return $this->conn->query($sql);
			}
		}

		public function error() {
			return $this->conn->error;
		}
	}
?>