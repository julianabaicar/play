<?php

class Model
{
    // A classe Model em PHP serve como um exemplo
    //  básico de como armazenar e acessar dados 
    // dentro de um objeto. Ela define uma variável
    //  ($string), inicializa essa variável no 
    // construtor, e fornece um método para 
    // recuperar o valor.

    // Defina variáveis como propriedades da classe:
    // Isso permite que cada objeto tenha seus próprios
    // dados.
    public $string;

    // Use o construtor para inicializar valores:
    // O método __construct() é chamado automaticamente
    // ao criar um novo objeto.
    public function __construct()
    {
        $this->string = "Ola Mundo...";
    }

    // Crie métodos para acessar ou modificar os dados:
    // Métodos como get_string() permitem que você recupere
    // ou altere informações de forma controlada.
    public function get_string()
    {
        return $this->string;
    }
}