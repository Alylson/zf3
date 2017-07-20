Bem-vindo ao mundo do Zend Framework 3. Aqui será feita a tradução do tutorial encontrado na documentação oficial da Zend Framework disponível em: https://docs.zendframework.com/tutorials/getting-started/overview/

Boa sorte nos estudos!

Para construir nossa aplicação, começaremos com o ZendSkeletonApplication disponível no github. Use o Composer para criar um novo projeto a partir do zero:

$ Composer create-project -s dev zendframework / skeleton-application path / to / install

Isso irá instalar um conjunto inicial de dependências, incluindo:

 Zend-component-installer, que ajuda a automatizar a injeção da configuração do componente em seu aplicativo.
 Zend-mvc, o kernel para aplicações MVC.
O padrão é fornecer a quantidade mínima de dependências necessárias para executar um aplicativo zend-mvc. No entanto, você pode ter necessidades adicionais que você conhece no início e, como tal, o esqueleto também é fornecido com um plugin de instalação que irá solicitar-lhe uma série de itens.

Primeiro, ele irá solicitar:

 Deseja uma instalação mínima (sem pacotes opcionais)? Y / n
Prompt e valores padrão

 Todos os prompts emitidos pelo instalador fornecem a lista de opções disponíveis e especificarão a opção padrão por meio de uma letra maiúscula. Os valores padrão são usados se o usuário pressionar "Enter" sem valor. No exemplo anterior, "Y" é o padrão.
Se você responder "Y", ou pressione enter sem seleção, o instalador não levantará nenhum aviso adicional e terminará de instalar seu aplicativo. Se você responder "n", ele continuará informando:

 Você gostaria de instalar a barra de ferramentas do desenvolvedor? Y / N
A barra de ferramentas do desenvolvedor fornece uma barra de ferramentas no navegador com informações de tempo e perfil, e pode ser útil na depuração de um aplicativo. Para os propósitos do tutorial, no entanto, não vamos usá-lo; Toque "Enter" ou "n" seguido de "Enter".

 Gostaria de instalar o suporte ao cache? Y / N
Não estaremos demonstrando o armazenamento em cache neste tutorial, então pressione "Enter" ou "n" seguido de "Enter".

 Gostaria de instalar suporte de banco de dados (instala zend-db)? Y / N
Vamos usar o zend-db extensivamente neste tutorial, então aperte "y" seguido de "Enter". Você deve ver o seguinte texto:

 Instalará zendframework / zend-db (^ 2.8.1)
 Quando solicitado a instalar como um módulo, selecione application.config.php ou modules.config.php
O próximo prompt é:

 Deseja instalar o suporte a formulários (instala o zend-form)? Y / N
Este tutorial também usa zend-form, então vamos selecionar novamente "y" para instalar isso; Assim, emite uma mensagem semelhante à usada para o zend-db.

Neste ponto, podemos responder "n" aos recursos restantes:

Gostaria de instalar o suporte JSON de / serialization? Y / N
Gostaria de instalar suporte de log? Y / N
Gostaria de instalar suporte de console baseado em MVC? (Recomendamos migrar para zf-console, symfony / console ou Aura.CLI) y / N
Gostaria de instalar o suporte i18n? Y / N
Gostaria de instalar os plugins MVC oficiais, incluindo suporte PRG, identidade e mensagens instantâneas? Y / N
Gostaria de usar o PSR-7 middleware dispatcher? Y / N
Gostaria de instalar suporte de sessões? Y / N
Gostaria de instalar o suporte ao teste MVC? Y / N
Gostaria de instalar a integração zend-di para zend-servicemanager? Y / N
Em um certo ponto, você verá o seguinte texto:

Atualizando o pacote raiz Executando uma atualização para instalar pacotes opcionais

...

Atualizando a configuração do aplicativo ...

Selecione qual arquivo de configuração deseja injetar 'Zend \ Db' em: [0] Não injetar [1] config / modules.config.php Faça a sua seleção (o padrão é 0):

Queremos habilitar as várias seleções que fizemos no aplicativo. Como tal, escolheremos 1, o que nos dará o seguinte prompt:

Lembre-se desta opção para outros pacotes do mesmo tipo? (Y / N)

No nosso caso, podemos dizer com segurança "y", o que significará que não seremos mais solicitados pacotes adicionais. (O único pacote no conjunto padrão de prompts que você não pode querer habilitar por padrão é Zend \ Test.)

Uma vez que a instalação está concluída, o instalador do esqueleto se remove e o novo aplicativo está pronto para começar!

Carregando o esqueleto

Outra maneira de instalar o ZendSkeletonApplication é usar o github para baixar um arquivo comprimido. Acesse https://github.com/zendframework/ZendSkeletonApplication, clique no botão "Clone ou download" e selecione "Baixar ZIP". Isso irá baixar um arquivo com um nome como ZendSkeletonApplication-master.zip ou similar.

Descompacte este arquivo no diretório onde você guarda todos os seus vhosts e renomeie o diretório resultante para o tutorial do zf.

O ZendSkeletonApplication está configurado para usar o Composer para resolver suas dependências. Execute o seguinte de dentro da sua nova pasta do tutorial do zf para instalá-los:

$ Auto-atualização do compositor
$ Compositor instalar

Isso demora um pouco. Você deve ver a saída como a seguinte:

Instalando dependências do arquivo de bloqueio
- Instalando zendframework / zend-component-installer (0.2.0)
  
...

Gerando arquivos de autoload

Neste ponto, você será solicitado a responder perguntas como mencionado acima.

Alternativamente, se você não tem o Composer instalado, mas tenha Vagrant ou docker-compose disponível, você pode executar o Composer através desses:

# Para Vagrant:
$ Vagrant
$ Vagrant ssh -c 'compositor install'
# Para docker-componer:
$ Docker-compose build
$ Docker-compose run zf composer install
Tempo limite

 Se você vir essa mensagem:

 [RuntimeException]
   O processo expirou.

 Então sua conexão era muito lenta para baixar todo o pacote no tempo e o compositor expirou. Para evitar isso, em vez de correr:

 $ Compositor instalar

 Execute em vez disso:

 $ COMPOSER_PROCESS_TIMEOUT = instalação do compositor 5000

 Utilizadores do Windows que utilizam o WAMP

 Para usuários do Windows com o Wamp:

     Instale o compositor para o Windows. Verifique se o compositor está instalado corretamente executando:

 $ Compositor

     Instale o GitHub Desktop para Windows. Verifique que o git esteja instalado corretamente executando:

 $ Git

     Agora instale o esqueleto usando:

 $ Composer create-project -s dev zendframework / skeleton-application path / to / install
Agora podemos avançar para a configuração do servidor web.

Agora podemos avançar para a configuração do servidor web. Servidores Web

Neste tutorial, nós o diremos através de quatro formas diferentes de configurar seu servidor web:

 Através do servidor web interno do PHP.
 Via Vagrant.
 Via docker-compose.
 Usando o Apache.
Usando o servidor web PHP embutido

Você pode usar o servidor web interno do PHP ao desenvolver sua aplicação. Para fazer isso, inicie o servidor no diretório raiz do projeto:

$ Php -S 0.0.0.0:8080 -t public public / index.php

Isso tornará o site disponível na porta 8080 em todas as interfaces de rede, usando public / index.php para lidar com o roteamento. Isso significa que o site está acessível através de http: // localhost: 8080 ou http: // : 8080.

Se você fez isso direito, você verá a tela de Welcome to Zend Framework.

Para testar que o seu roteamento está funcionando, navegue até http: // localhost: 8080/1234 e você deve ver a seguinte página 404:

Page Not Found.

Desenvolvimento apenas

 O servidor web interno do PHP deve ser usado apenas para desenvolvimento.
Usando Vagrant

Vagrant fornece uma maneira de descrever e provisionar máquinas virtuais, e é uma maneira comum de fornecer um ambiente de desenvolvimento consistente e consistente para equipes de desenvolvimento. O aplicativo esqueleto fornece um Vagrantfile baseado no Ubuntu 14.04 e usando o ondrej / php PPA para fornecer o PHP 7.0. Iniciá-lo usando:

$ Vagrant

Uma vez que foi construído e está sendo executado, você também pode executar o compositor da máquina virtual. Como exemplo, o seguinte irá instalar dependências:

$ Vagrant ssh -c 'compositor install'

Enquanto isso irá atualizá-los:

$ Vagrant ssh -c 'compositor update'

A imagem usa o Apache 2.4 e mapeia a porta do host 8080 para a porta 80 na máquina virtual.

Usando docker-compose

Os recipientes do Docker envolvem um pedaço de software e tudo o que é necessário para executá-lo, garantindo uma operação consistente, independentemente do ambiente do host; É uma alternativa para máquinas virtuais, pois é executado como uma camada em cima do ambiente do host.

Docker-compose é uma ferramenta para automatizar a configuração de contêineres e compor dependências entre eles, como armazenamento de volume, rede, etc.

O aplicativo de esqueleto é fornecido com um Dockerfile e configuração para docker-compose; Recomendamos o uso do docker-compose, pois fornece uma base para o mapeamento de contêineres adicionais que você pode precisar como parte de seu aplicativo, incluindo um servidor de banco de dados, servidores de cache e muito mais. Para criar e iniciar a imagem, use:

$ Docker-compose up -d --build

Após a primeira compilação, você pode truncar isso para:

$ Docker-compose up -d

Uma vez construído, você também pode executar comandos no recipiente. A configuração docker-componer inicialmente apenas define um recipiente, com o nome do ambiente "zf"; Use isso para executar comandos, como atualizar dependências via compositor:

$ Docker-compose run zf compositor update

A configuração inclui o PHP 7.0 e o Apache 2.4 e mapeia a porta do host 8080 para a porta 80 do contêiner.

Usando o Servidor da Web Apache

Não iremos cobrir a instalação do Apache e assumiremos que você já tenha instalado. Recomendamos instalar o Apache 2.4 e abranger apenas a configuração dessa versão.

Agora você precisa criar um host virtual Apache para o aplicativo e editar seu arquivo de hosts para que http: //zf-tutorial.localhost servirá index.php no diretório zf-tutorial / public /.

Configurar o host virtual geralmente é feito dentro de httpd.conf ou extra / httpd-vhosts.conf. Se você estiver usando o httpd-vhosts.conf, certifique-se de que este arquivo esteja incluído no seu arquivo principal httpd.conf. Algum pacote Linux distribuições (ex: Ubuntu) Apache para que os arquivos de configuração sejam armazenados em / etc / apache2 e crie um arquivo por host virtual dentro da pasta / etc / apache2 / sites-enabled. Nesse caso, você colocaria o bloco de host virtual abaixo no arquivo / etc / apache2 / sites-enabled / zf-tutorial.

Certifique-se de que NameVirtualHost está definido e definido como *: 80 ou similar e, em seguida, defina um host virtual ao longo dessas linhas:

<VirtualHost *: 80> ServerName zf-tutorial.localhost DocumentRoot / caminho / para / zf-tutorial / público SetEnv APPLICATION_ENV "desenvolvimento" <Diretório / caminho / para / zf-tutorial / público> DirectoryIndex index.php AllowOverride All Exigir tudo concedido </ Directory> </ VirtualHost>

Verifique se você atualiza o arquivo / etc / hosts ou c: \ windows \ system32 \ drivers \ etc \ hosts para que o zf-tutorial.localhost seja mapeado para 127.0.0.1. O site pode então ser acessado usando http: //zf-tutorial.localhost.

127.0.0.1 zf-tutorial.localhost localhost

Reinicie o Apache.

Se você fez isso de forma correta, você obterá os mesmos resultados cobertos pelo servidor interno interno do PHP.

Para testar que o seu arquivo .htaccess está funcionando, navegue até http: //zf-tutorial.localhost/1234, e você deve ver a página 404 conforme mencionado anteriormente. Se você vir um erro padrão do Apache 404, então você precisa corrigir o seu uso .htaccess antes de continuar.

Se você estiver usando o IIS com o Módulo de Reescrita de URL, importe o seguinte:

RewriteCond% {REQUEST_FILENAME}! -f RewriteRule ^ index.php [NC, L]

Agora você tem um aplicativo de esqueleto de trabalho e podemos começar a adicionar os detalhes para nossa aplicação.

Relatório de erros

Opcionalmente, ao usar o Apache, você pode usar a configuração APPLICATION_ENV em seu VirtualHost para permitir que PHP publique todos os seus erros para o navegador. Isso pode ser útil durante o desenvolvimento de sua aplicação.

Edite o diretório zf-tutorial / public / index.php e altere-o para o seguinte:
Php Use o Zend \ Mvc \ Application; / ** * Exibir todos os erros quando APPLICATION_ENV é desenvolvimento. * / Se ($ _SERVER ['APPLICATION_ENV'] === 'desenvolvimento') { Error_reporting (E_ALL); Ini_set ("display_errors", 1); } / ** * Isso torna nossa vida mais fácil ao lidar com caminhos. Tudo é relativo * Para a raiz do aplicativo agora. * / Chdir (dirname (__ DIR__)); // Recusar pedidos de arquivos estáticos de volta para o servidor web interno do PHP Se (php_sapi_name () === 'cli-server') { $ Path = realpath (__ DIR__. Parse_url ($ _ SERVER ['REQUEST_URI'], PHP_URL_PATH)); Se (__FILE__! == $ path && is_file ($ caminho)) { Retornar falso; } Unset ($ path); } // Autenticação do compositor Incluir __DIR__. '/../vendor/autoload.php'; Se (! Class_exists (Application :: class)) { Lança nova RuntimeException ( "Não é possível carregar o aplicativo. \ N" . "- Digite` composer install` se você estiver desenvolvendo localmente. \ N " . "- Digite` vagrant ssh -c 'compositor install'` se você estiver usando Vagrant. \ N " . "- Digite` docker-compose run zf composer install` se você estiver usando o Docker. \ N " ); } // Recuperar configuração $ AppConfig = requerem __DIR__. '/../config/application.config.php'; Se (file_exists (__ DIR__. '/../config/development.config.php')) { $ AppConfig = ArrayUtils :: merge ($ appConfig, requerem __DIR__. '/../config/development.config.php'); } // Execute o aplicativo! Application :: init ($ appConfig) -> run (); Modo de desenvolvimento Antes de começarmos, vamos habilitar o modo de desenvolvimento para a aplicação. O aplicativo esqueleto fornece dois arquivos que nos permitem especificar configurações gerais de desenvolvimento que queremos usar em todos os lugares; Estes podem incluir módulos de habilitação para depuração, ou permitir a exibição de erros em nossos scripts de exibição. Esses arquivos estão localizados em: Config / development.config.php.dist Config / autoload / development.local.php.dist Quando ativamos o modo de desenvolvimento, esses arquivos são copiados para: Config / development.config.php Config / autoload / development.local.php Isso permite que eles sejam incorporados em nosso aplicativo. Quando desativamos o modo de desenvolvimento, esses dois arquivos que foram criados foram removidos, deixando apenas as versões .dist. (O repositório também contém regras para ignorar as cópias). Vamos permitir o modo de desenvolvimento agora: $ Development do compositor Nunca habilite o modo de desenvolvimento na produção Você nunca deve habilitar o modo de desenvolvimento na produção, pois o motivo típico para habilitá-lo é habilitar a depuração! Conforme observado, os artefatos gerados ao ativar o modo de desenvolvimento não podem ser comprometidos com seu repositório, portanto, supondo que você não execute o comando na produção, você deve estar seguro. Você pode testar o status do modo de desenvolvimento usando: $ Development-status do compositor E você pode desativá-lo usando: $ Composer development-disable
