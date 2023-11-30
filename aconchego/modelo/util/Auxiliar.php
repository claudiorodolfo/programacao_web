<?php
/**
 * @package model
 */

/**
 * Classe com a implementação das operações que podem ser uteis
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 24, 2023
 */
class Auxiliar {

	public function dataColocaMascara($data) {
		$data = preg_replace("/\D/", '', $data);
		return preg_replace("/(\d{4})(\d{2})(\d{2})/", "\$3/\$2/\$1", $data);
	}

	public function dataRemoveMascara($data) {
		$data = preg_replace("/\D/", '', $data);
		return preg_replace("/(\d{2})(\d{2})(\d{4})/", "\$3-\$2-\$1", $data);
	}

	public function cpfColocaMascara($cpf) {
		return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
	}

	public function cpfRemoveMascara($cpf) {
		return preg_replace("/\D/", '', $cpf);;
	}

	public function telefoneColocaMascara($telefone) {
		return preg_replace("/(\d{2})(\d{1})(\d{4})(\d{4})/", "(\$1) \$2 \$3-\$4", $telefone);
	}

	public function telefoneRemoveMascara($telefone) {
		return preg_replace("/\D/", '', $telefone);
	}
}
?>