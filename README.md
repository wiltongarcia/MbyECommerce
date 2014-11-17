# Briefing do cliente

### Requisitos técnicos:
Elaborar um carrinho de compras simples (lista de categorias / lista de produtos / busca / detalhe / carrinho / criação do pedido) em PHP / Mysql  em Yii ou ZendFramwork 1 (Pode ser utilizado tecnologias complementares como caches/ motores de pesquisa / Queue / etc );

### Requisitos funcionais :
Os produtos devem estar em um banco de dados relacional nos quais devem ser exibidos na lista;
Os produtos devem possuir os seguintes atributos : nome, descriçao, imagem, preço, categoria(um produto pode estar em mais de uma categoria) , caracteristicas (devem ser pré-definidas e associadas ao produto) ;
Não é necessário criar um layout elaborado;
O carrinho deve ser mantido mesmo se o usuário navegar em outra pagina (nova busca / listagem / ou detalhe do produto );
O pedido deve ser salvo no banco de dados contemplando todos os itens do carrinho e os dados do usuario ( Pessoais e de entrega );
Não é necessário integração de nenhuma forma de pagamento, apenas gerar o registro do pedido no banco de dados;

### Entrega :
O código do projeto deve ser colocado no github ou bitbucket do candidato e deve ser enviado apenas o link publico do projeto (Código php, Bibliotecas, Estrutura do banco de dados - com dados para teste );

# Especificações do Desenvolvedor
-   A estrutura do banco de dados está na pasta docs/dump/ e se chama database.sql;
-   Foi utilizado no desenvolvimento a versão 5.5.27 do Mysql;
-   Selecionei Yii Framework 1.1 acreditando que é a versão mais proxima a que o cliente utiliza;
-   Utilizei o memcached para fazer cache das queries mais pesadas, das buscas e para fazer a fila de pedidos;
-   A extensão utilizada para o memcached foi a Memchache(http://php.net/manual/en/book.memcache.php), que é default no Yii 1.1;
-   Para fazer a fazer a fila de pedidos eu usei o MEMQ(https://github.com/abhinavsingh/memq), mas modifiquei a extensão para Menchache, já que o MEMQ utiliza o Mencached(http://php.net/manual/pt_BR/book.memcached.php);
-   As buscas foram idexadas usando o ZendLucene(http://framework.zend.com/manual/1.12/en/zend.search.lucene.html) e os resultados foram guardados no memcached;
-   A senha do admin é a padrão do Yii (user: admin, pass: admin);
-   O Diagrama de banco de dados pode ser visualizado em https://drive.google.com/file/d/0B0ftvEoVq2iLblBFcW5WdjFhd2s/view?usp=sharing ;
-   Tudo que foi utlizado nesse projeto está em UTF-8.

