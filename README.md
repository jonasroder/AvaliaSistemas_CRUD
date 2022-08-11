
# Sobre o projeto

Esta aplicação foi desenvolida como parte do processo seleteivo para a vaga de desenvolvedor WEB da empresa AvaliaSistemas. Todas as operações de CRUD (Listagem, insert, update e delete) são feitas com jQuery.

# Tecnologias utilizadas
- PHP
- HTML / CSS / JS 


## Entendo e Configurando a Aplicação
### As Paginas poderão ser acessadas da seguinte maneira 
![url](https://user-images.githubusercontent.com/81712575/184037942-647b01a9-7225-43ba-9446-5cb1baf80ee0.jpg)
- O Método passado por parametro irá fazer a requisição de uma View que irá montar o html;
- O método padrão de requisição irá fazer o include do template, que por sua vez irá chamar a view especifica do método.
- Para o funcinamento da url amigavel, é necessario nomear o diretório pai no arquivo .htaccess

### A Criação de arquivos e classes devem seguir a seguinte regra
- O nome do arquivo e da classe devem ser acompanhados pela palava Controler após o prefixo
![controller](https://user-images.githubusercontent.com/81712575/184041474-9dc3c7c3-94ee-4e2a-9cb3-c4a28c07c6c1.jpg)

- Para a criação de arquivos model e classes model o nome de ambos deverá ser o mesmo que o prefixo do controlador
![model](https://user-images.githubusercontent.com/81712575/184041926-6e7fffb3-8752-4764-940f-c9056baa94eb.jpg)


### Banco de Dados e execução de SQL
![banco](https://user-images.githubusercontent.com/81712575/184042725-16bd6a0e-d873-4c22-bf0b-f01050d5cba7.jpg)
- As configurações de execução do banco deverão ser feitas no arquivo conexaoDB.php

![run sql](https://user-images.githubusercontent.com/81712575/184043058-855cdb52-a363-4fb1-a58d-2e9af8cc9d78.jpg)
- As execuções de SQL poderão ser feitas através da singleton db::runSQL(), ela ira retornar um array contendo o array de dados, o número de linhas, a consulta executada e erro se houver;

### Método e regras para Post
- O nome do Input deve ser atribuido seguindo a seguinte regra:
![input](https://user-images.githubusercontent.com/81712575/184043874-07cfa050-3ce1-478d-8099-4aa241b76e45.jpg)
- 1: indice de tabela, se mais de uma tabela for enviada no mesmo Post, o indice deverá ser alterado de modo que seja único para cada tabela;
- 2: indicador da ação, podendo ser eles update (u), insert (i), delete(d);
- 3: nome da tabela;
- 4: nome da coluna da tabela;
 ##### É obrigatório o envio do valor da coluna PK da tabela para os casos de update e delete;
 
- O Envio de dados para o backEnd poderá ser feito pelo método post

![post](https://user-images.githubusercontent.com/81712575/184044769-5763c748-8c48-4c67-b539-744b5c982416.jpg)
- Em parametro, o método post poderá receber um objeto com 2 atributos. Se nenhum parametro for informado, ele irá enviar todos os inputs da página que sigam a regra a cima citado.
- O atributo seletor, pode receber um seletor, para que seja enviado somente os dados de dentro do html desejado.
- O atributo dados recebe um objeto com atributos a serem enviados separadamente;
![post delete](https://user-images.githubusercontent.com/81712575/184045675-1d59d38f-ae69-4e4a-bde0-97e9483df36c.jpg)


