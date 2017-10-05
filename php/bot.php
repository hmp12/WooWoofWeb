<?php
	class Bot {
		private $db;

		function Bot($db) {
			$this->db = $db;
		}

		function chat($in) {
			$sql = "SELECT pattern, template FROM aiml
			WHERE pattern = '$in'";
			$data = $this->db->query($sql);
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()){
					$out = $row["template"];
				}
			}
			else {
				$out = "I don\'t understand";
			}
			return $out;
		}

		function learn($file) {
			$xml = simplexml_load_file($file);
        	if (!empty($xml->topic)) {
        		foreach ($xml->topic as $topic) {
        			$topicAttr = $topic->attributes();
        			$topic = $topicAttr['name'];
		        	foreach ($xml->category as $category) {
						$pattern = $category->pattern;
						$pattern = trim($pattern);
						$pattern = strtoupper($pattern);

						$that = $category->that;
						$that = strtoupper($that);

						$template = $category->template->asXML();
						$template = str_replace('<template>', '', $template);
                        $template = str_replace('</template>', '', $template);
                        $template = trim($template);
                        $sql = "INSERT INTO aiml(topic, pattern, thatpattern, template, filename)
						VALUE ('$topic', '$pattern', '$that', '$template', '$file')";
						$this->db->query($sql);
					}
				}
        	}
        	$topic = '';
        	if (!empty($xml->category)) {
        		foreach ($xml->category as $category) {
					$pattern = $category->pattern;
					$pattern = trim($pattern);
					$pattern = str_replace("'", ' ', $pattern);
					$pattern = strtoupper($pattern);

					$that = $category->that;
					$that = strtoupper($that);

					$template = $category->template->asXML();
					$template = str_replace('<template>', '', $template);
                    $template = str_replace('</template>', '', $template);
                    $template = trim($template);

                    $sql = "INSERT INTO aiml(topic, pattern, thatpattern, template, filename)
					VALUE ('$topic', '$pattern', '$that', '$template', '$file')";
					$this->db->query($sql);
				}
        	}
		}
	}
?>