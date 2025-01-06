<?php
// Insira sua chave da news api
$API_KEY = "";

// Definindo o URL de consulta da api
$base_url = "https://newsapi.org/v2/everything?sources=bbc-news&sortBy=popularity&apiKey=" . $API_KEY;
$search_url = isset($_GET['search'])? "&q=" . urlencode($_GET['search']) : ''; // Pega, caso exista, o valor enviado pelo form de pesquisa para utilizar no request
$page_url = isset($_GET['page'])? "&page=" . $_GET['page'] : ''; // Pega, caso exista, o valor de página passado no url pelos botões de troca de página para utilizar no request
$API_URL = $base_url . $search_url . $page_url ;

// Define o url que será acionado ao clicar nos botões de troca de página
// Mantém o valor de pesquisa, caso haja
// O número da página é especificado em view.php, visto que cada botão leva para uma página diferente
$pageChangeParams = "index.php" . (isset($_GET['search'])? "?search=" . $_GET['search'] . "&page=" : "?page=");

// Configurações do curl, ferramenta que faz o request para a API
$agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36";
$curl = curl_init($API_URL); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, $agent);

// Execução do request
$response = json_decode(curl_exec($curl));
curl_close($curl);

// Define o número de páginas baseado na resposta recebida pela API
// Cada página contém 100 resultados
$pageCount = min(ceil($response->totalResults / 100), 5);

// Armazena o array de artigos em uma variável para facilitar o processo na view
$articles = $response->articles;

require "view.php";
