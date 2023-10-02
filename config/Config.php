<?php

// URL base
define("BASE_URL", "http://localhost/ManoloBakes");

// Zona horaria
date_default_timezone_set('America/Sao_Paulo');

// Dados de conexão ao Banco de Dados
const DB_HOST = "localhost";
const DB_NAME = "manolobakes";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "charset=utf8";

// Deliminadores decimal e milhar - Ex: 24.1989,00
const SPD = ",";
const SPM = ".";

// Símbolo da moeda
const SMONEY = "R$";

// Dados envio de e-mail
const NOME_REMETENTE = "Manolo Bakes";
const EMAIL_REMETENTE = "no-reply@abelosh.com";
const NOME_EMPRESA = "Manolo Bakes";
const WEB_EMPRESA = "www.abelosh.com";
