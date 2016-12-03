<?php
final class Conexao {
	private function __construct() {}

	public static function open() {
		$usuario = "root";
		$senha = "administrador";
		$bancodedados= "DB_MANAGER";
		$host= "127.0.0.1";
		$porta = "3306";
		$conexao = new PDO("mysql:host={$host};port={$porta};dbname={$bancodedados}", $usuario, $senha);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexao->Query("SET NAMES utf8");

		return $conexao;
	}
}
?>
