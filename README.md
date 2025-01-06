# noticias
Web app em php que consulta a News API para mostrar notícias recentes.

### Requisitos
- Conexão com a internet
- PHP (7.4 ou superior)
- Biblioteca cURL devidamente configurada
- Navegador

### Instalação
1. Clone o repositório
2. Coloque sua chave de API no local correto em ```index.php```
3. Inicie um servidor PHP na pasta contendo os dois arquivos
4. Abra o servidor no navegador

### Estrutura do projeto
- index.php: contém a lógica do projeto, maneja as requisições à API e o processamento de certos parâmetros (pesquisa e paginação);
- view.php: define o HTML do projeto, e contém loops de criação dos cards de notícias e dos botões de troca de páginas.

### Limitações
- A API só permite a exibição de 500 resultados em um só request. Portanto, por mais que apareça, por exemplo, "Exibindo 100 de 1400 notícias", você só será capaz de paginar até a noticia 500.
