# PR-03 - Sistemas Distribuidos

## Intruções de Configuração do Ambiente

Instale o [Git](https://git-scm.com/download/win) (Opcional), [Laragon](https://github.com/leokhoa/laragon/releases/download/5.0.0/laragon-wamp.exe) e o [MySQL Workbench](https://dev.mysql.com/get/Downloads/MySQLGUITools/mysql-workbench-community-8.0.25-winx64.msi) (opcional. O tutorial abordará a utilização do mesmo, mas é possivel fazer o processo por outros meios, como linha de comando ou outro software, como o DBeaver).

Clone o projeto do jeito que preferir (usando o comando git ou baixando o zip), colocando o projeto no diretório `C:\laragon\www`
 
Este diretório ficará assim:

![image](https://user-images.githubusercontent.com/25585428/142513822-9d87ec9f-4489-47e3-ae7b-79411569b9ef.png)

Copie o arquivo .env.example e renomeie a cópia como `.env`

Descompacte o arquivo `php-8.0.7-Win32-vs16-x64.zip` no diretório `C:\laragon\bin\php`

Este diretório ficará parecido com isso (as versões já presentes podem variar):

![image](https://user-images.githubusercontent.com/25585428/142513831-30236d38-e3f0-4e2d-851c-468af83686b1.png)

No Laragon, clique no meio com o botão direito, e altera a versão do PHP para a 8.0

![image](https://user-images.githubusercontent.com/25585428/142516453-633a1dc1-1353-4ca1-ad68-75cbc4d9f409.png)


No MySQL Workbench, crie uma nova conexão, dê um nome e clique em ok

![image](https://user-images.githubusercontent.com/25585428/142513969-1f001ffe-7cc1-4ff1-b9bb-4c7b17015889.png)

![image](https://user-images.githubusercontent.com/25585428/142513981-87fe46a4-0eff-483c-9e34-1f51d7ad21e5.png)


Vá na aba Schemas

![image](https://user-images.githubusercontent.com/25585428/142515393-50e1a90f-4f43-46a1-ab67-2166ed24c37a.png)



Clique com o botão direito e clique em "Create Schema"

![image](https://user-images.githubusercontent.com/25585428/142514009-62caaa72-6eca-486b-bfc5-1112d8ecf83f.png)


Insira o nome "pr-03" e clique em "Apply"

![image](https://user-images.githubusercontent.com/25585428/142514033-e2e84ebf-a08c-4e47-9a73-6ef8579ef7f4.png)

Abra o terminal do Laragon

![image](https://user-images.githubusercontent.com/25585428/142514195-c3b8e973-788a-4a4b-b79d-f47d758d718a.png)

insira o comando

```
composer install
```

espere o processo ser concluído e insira

```
php artisan key:generate
```
em seguida insira

```
php artisan jwt:secret
```
Caso seja perguntado:
![image](https://user-images.githubusercontent.com/25585428/142514380-9f19b71f-1e74-4fdb-abc9-b6d526895da7.png)

insira `yes` e pressione enter

e por fim, insira

```
php artisan migrate
```

e espere as migrações serem executadas (esse processo pode demorar usando um HDD)

![image](https://user-images.githubusercontent.com/25585428/142514470-3cb8cd10-f488-4adc-93a9-0e8507b30c1e.png)

## Instruções de Uso do Postman

Instale o [Postman](https://www.postman.com/downloads/)

Depois de instalado, importe a collection presente nesse repositório

![image](https://user-images.githubusercontent.com/25585428/142515108-ba651d91-8fee-416c-9125-418dc0cad66f.png)
![image](https://user-images.githubusercontent.com/25585428/142515157-6e1874f1-7cbc-4f81-8e0d-00dae02acd5d.png)
![image](https://user-images.githubusercontent.com/25585428/142515198-f8b9ff20-0666-4f55-9823-73888cdc8a2c.png)


Crie um cadastro

![image](https://user-images.githubusercontent.com/25585428/142514748-1b4d8b4f-9efd-4445-8db6-b4e1461aceb7.png)

ou faça login caso já tenha se registrado

![image](https://user-images.githubusercontent.com/25585428/142514781-9927ee19-1975-4fc7-885b-c2288703e1f7.png)

Crie uma lista

![image](https://user-images.githubusercontent.com/25585428/142515524-925d03d0-82f0-4ab8-b33d-766be3ad0192.png)

Crie um item

![image](https://user-images.githubusercontent.com/25585428/142514652-c91cbb92-a1ae-4da2-8ab4-0bb6771e4812.png)

Explore os outros comandos clicando nos mesmos. Todos possuem uma documentação que detalha sua função e retorno, que pode ser acessada clicando em

![image](https://user-images.githubusercontent.com/25585428/142514930-b09ff002-c3bb-465c-8a49-27ca57753698.png)




