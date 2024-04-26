<?php
//Mapeamento Objeto Relacional
//Object-Relational Mapping - ORM

//Cliente.php
	class Cliente {
		private $id;
		private $nome;
		private $email;
		private $idEmpresa;
		
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}

		public function getNome() {
			return $this->nome;
		}
		
		public function setNome($nome) {
			$this->nome= $nome;
		}

		public function getEmail() {
			return $this->email;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function getIdEmpresa() {
			return $this->idEmpresa;
		}
		
		public function setIdEmpresa($idEmpresa) {
			$this->idEmpresa = $idEmpresa;
		}		
	}
?>