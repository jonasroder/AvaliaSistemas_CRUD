
# Sobre o projeto

Esta aplicação foi desenvolida como parte do processo seleteivo para a vaga de desenvolvedor WEB da empresa AvaliaSistemas. Todas as operações de CRUD (Listagem, insert, update e delete) são feitas com jQuery.

# Tecnologias utilizadas
## Back end
- PHP

## Front end
- HTML / CSS / JS 


## Entendo e Configurando a Aplicação
### As Paginas poderão ser acessadas da seguinte maneira 
![url](https://user-images.githubusercontent.com/81712575/184037942-647b01a9-7225-43ba-9446-5cb1baf80ee0.jpg)
- O Método passado por parametro irá fazer a requisição de uma View que irá montar o html;
- O método padrão de requisição irá fazer o include do template, que por sua vez irá chamar a view especifica do método.
- Para o funcinamento da url amigavel, é necessario nomear o diretório pai no arquivo .htaccess

### A Criação de arquivos e classes devem seguir a seguinte regra
![controller](https://user-images.githubusercontent.com/81712575/184041474-9dc3c7c3-94ee-4e2a-9cb3-c4a28c07c6c1.jpg)
- O nome do arquivo e da classe devem ser acompanhados pela palava Controler após o prefixo
![model](https://user-images.githubusercontent.com/81712575/184041926-6e7fffb3-8752-4764-940f-c9056baa94eb.jpg)
- Para a criação de arquivos model e classes model o nome de ambos deverá ser o mesmo que o prefixo do controlador


