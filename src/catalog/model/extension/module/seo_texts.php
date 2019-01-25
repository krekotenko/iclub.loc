<?php
class ModelExtensionModuleSeoTexts extends Model {

  public function getSeoText($url) {
    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seotext s LEFT JOIN " . DB_PREFIX . "seotext_description sd ON (s.text_id = sd.text_id) WHERE url = '" . $url . "' AND sd.language_id = '" . (int)$this->config->get('config_language_id') . "' LIMIT 0,1");

    if ($query->num_rows) {
			return array(
				'name'       => $query->row['title'],
                'text'       => $query->row['text'],
                'url'       => $query->row['url'],
      );
    } else {
      return false;
    }

  }

}
