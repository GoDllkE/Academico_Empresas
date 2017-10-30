<?php
    class Conexão {
        // [Static] Dados de conexão 
        private $servidor="localhost";
        private $usuario="empresa";
        private $senha="123456";
        private $nomeDB="bdEmpresas";
        
        // Conector
        private $conector;
        
        function abreConexao() {
            $this->conector = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->nomeDB) 
                    or die(mysqli_error($this->conector));
        }
        
        function executaSQL($sqlRun) {
            // Abre conexao
            $this->abreConexao();
            // Executa query
            $sqlResult = mysqli_query($this->conector, $sqlRun);
            // retorna SQL-Result
            return $sqlResult;
        }

        function fechaConexao() {
            mysqli_close($this->conector);
        }
    }
?>