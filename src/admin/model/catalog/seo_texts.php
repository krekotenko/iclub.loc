<?php

/**
 * Created by PhpStorm.
 * User: Meits
 * Date: 04-Jan-18
 * Time: 10:39
 */
class ModelCatalogSeoTexts extends Model
{
    public function addSeoText($data) {

        $this->event->trigger('pre.admin.seotext.add', $data);

        $this->db->query("INSERT INTO " . DB_PREFIX . "seotext SET status = '" . (int)$data['status'] . "', url = '" . $data['url'] . "'");

        $text_id = $this->db->getLastId();

        foreach ($data['seotext_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "seotext_description SET text_id = '" . (int)$text_id . "', language_id = '" . (int)$language_id . "', text = '" . $this->db->escape($value['text']) . "', title = '".$this->db->escape($value['title'])."'");
        }

        $this->cache->delete('seotext');

        $this->event->trigger('post.admin.seotext.add', $data);

        return $text_id;
    }

    public function editSeoText($text_id, $data) {
        $this->event->trigger('pre.admin.seotext.edit', $data);

        $this->db->query("UPDATE " . DB_PREFIX . "seotext SET status = '" . (int)$data['status'] . "', url = '" . $data['url'] . "' WHERE text_id = '" . (int)$text_id . "'");

        $this->db->query("DELETE FROM " . DB_PREFIX . "seotext_description WHERE text_id = '" . (int)$text_id . "'");

        foreach ($data['seotext_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "seotext_description SET text_id = '" . (int)$text_id . "', language_id = '" . (int)$language_id . "', text = '" . $this->db->escape($value['text']) . "', title = '".$this->db->escape($value['title'])."'");
        }

        $this->cache->delete('seotext');

        $this->event->trigger('post.admin.seotext.edit', $data);
    }

    public function deleteSeoText($text_id) {
        //$this->event->trigger('pre.admin.seotext.delete', $data);

        $this->db->query("DELETE FROM " . DB_PREFIX . "seotext WHERE text_id = '" . (int)$text_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "seotext_description WHERE text_id = '" . (int)$text_id . "'");

        $this->cache->delete('seotext');

        //$this->event->trigger('post.admin.seotext.delete', $text_id);
    }

    public function getTotalSeoTexts() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "seotext");

        return $query->row['total'];
    }

    public function getSeoText($text_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seotext s LEFT JOIN " . DB_PREFIX . "seotext_description sd ON (s.text_id = sd.text_id) WHERE s.text_id = '" . (int)$text_id . "'");

        return $query->row;
    }

    public function getSeoTextDescriptions($text_id) {
        $seotext_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seotext_description WHERE text_id = '" . (int)$text_id . "'");

        foreach ($query->rows as $result) {
            $seotext_description_data[$result['language_id']] = array(
                'text'            => $result['text'],
                'title'  => $result['title']
            );
        }

        return $seotext_description_data;
    }

    public function getSeoTexts($data = array()) {
        if ($data) {
            $sql = "SELECT * FROM " . DB_PREFIX . "seotext s LEFT JOIN " . DB_PREFIX . "seotext_description sd ON (s.text_id = sd.text_id) WHERE sd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

            $sort_data = array(
                'id.title',
                'i.sort_order'
            );

            if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
                $sql .= " ORDER BY " . $data['sort'];
            } else {
                $sql .= " ORDER BY s.url";
            }

            if (isset($data['order']) && ($data['order'] == 'DESC')) {
                $sql .= " DESC";
            } else {
                $sql .= " ASC";
            }

            if (isset($data['start']) || isset($data['limit'])) {
                if ($data['start'] < 0) {
                    $data['start'] = 0;
                }

                if ($data['limit'] < 1) {
                    $data['limit'] = 20;
                }

                $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
            }

            $query = $this->db->query($sql);

            return $query->rows;
        } else {
            $text_data = $this->cache->get('seotext.' . (int)$this->config->get('config_language_id'));

            if (!$text_data) {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seotext s LEFT JOIN " . DB_PREFIX . "seotext_description sd ON (s.text_id = sd.text_id) WHERE sd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

                $text_data = $query->rows;

                $this->cache->set('seotext.' . (int)$this->config->get('config_language_id'), $text_data);
            }

            return $text_data;
        }
    }
}