<?php
/**
 * Coda class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Codabox;

class Coda {
	use \Skeleton\Object\Model;


	/**
	 * Mark processed
	 *
	 * @access public
	 */
	public function mark_processed() {
		if ($this->processed) {
			throw new \Exception('Coda already processed');
		}
		$data = [
			'call' => 'markProcessed',
			'id' => $this->id
		];
		\Tigron\Codabox\Client\Json::call('/coda', $data);
	}

	/**
	 * Mark unprocessed
	 *
	 * @access public
	 */
	public function mark_unprocessed() {
		if (!$this->processed) {
			throw new \Exception('Coda already set to "unprocessed"');
		}
		$data = [
			'call' => 'markUnProcessed',
			'id' => $this->id
		];
		$ids = \Tigron\Codabox\Client\Json::call('/coda', $data);
	}

	/**
	 * Get unprocessed
	 *
	 * @access public
	 * @return array $codas
	 */
	public static function get_unprocessed() {
		$data = [
			'call' => 'getUnprocessed',
		];
		$ids = \Tigron\Codabox\Client\Json::call('/coda', $data);
		$codas = [];
		foreach ($ids as $id) {
			$codas[] = self::get_by_id($id);
		}
		return $codas;
	}

	/**
	 * Get by year
	 *
	 * @access public
	 * @param string $yead
	 * @return array $codas
	 */
	public static function get_by_year($year) {
		$data = [
			'call' => 'getByYear',
			'year' => $year,
		];
		$ids = \Tigron\Codabox\Client\Json::call('/coda', $data);
		$codas = [];
		foreach ($ids as $id) {
			$codas[] = self::get_by_id($id);
		}
		return $codas;
	}

	/**
	 * Get by id
	 *
	 * @access public
	 * @param string $id
	 * @return Coda $coda
	 */
	public static function get_by_id($id) {
		$data = [
			'call' => 'getById',
			'id' => $id
		];

		$data = \Tigron\Codabox\Client\Json::call('/coda', $data);
		$coda = new self();
		$coda->id = $data['uuid'];
		$coda->name = $data['name'];
		$coda->mime_type = $data['mime_type'];
		$coda->size = $data['size'];
		$coda->created = $data['created'];
		$coda->human_size = $data['human_size'];
		$coda->content = $data['content'];
		$coda->processed = $data['processed'];
		return $coda;
	}

}
