
# Migração dos Dados da wiki.sj.ifsc.edu.br Para a Nova Versão da Mediawiki

Nesse repositório é descrito o processo usado para migração do conteúdo da [antiga Wiki do câmpus SJ](https://wiki.sj.ifsc.edu.br/wiki/index.php/P%C3%A1gina_principal) para a [ nova Wiki](https://cicd.sj.ifsc.edu.br/index.php/P%C3%A1gina_principal).



A antiga wiki encontrava-se na versão 1.16.0 do software open source [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki).
A migração do conteúdo foi feita para a versão mais recente (1.30.0).

## Software instalado
|Produto	|Versão|
|---------|------|
|MediaWiki|	1.30.0|
|PHP	|7.0.30 (apache2handler)|
|MariaDB	|10.1.23-MariaDB|
|ICU	|52.1|



## Lista de Antigas Extensões

Abaixo, tabela com os antigos plugins, cujas instalações foram necessárias na nova versão da Wiki:

| NOME                        | INFO                                              | WIKI ANTIGA   | WIKI NOVA                          |
|-----------------------------|---------------------------------------------------|---------------|------------------------------------|
| [Semantic MediaWiki](https://www.semantic-mediawiki.org/wiki/Help:User_manual)          | melhorar estrutura e organização                                      | versão 1.5.6  | versão 2.5.4                       |
| Semantic Project Management | junto com semantic mediawiki, exportar projetos   | versão 1.5    | DESATIVADA                         |
| [Collection](https://www.mediawiki.org/wiki/Extension:Collection)                  | criar livros                                      | versão 1.4    | versão 1.7.0 (2014-04-18)          |
| [Cite](https://www.mediawiki.org/wiki/Extension:Cite)                        | auxílio para citações                             |       -       | já vem com a versão nova  da wiki   |
| [EmbedVideo](https://www.mediawiki.org/wiki/Extension:EmbedVideo)                  | inserir vídeo na wiki com link (youtube)          | versão 1.0    | versão 2.7.0 (2017-05-08)          |
| GeSHiCodeTag                | highlight de textos dentro da wiki                | Versão 1.65   | DESATIVADA, [opção nova](https://www.mediawiki.org/wiki/Extension:SyntaxHighlight)  |
| Google Calendar             | exibir calendario google na wiki                  |       -       | DESATIVADA, [widget google calendar](https://www.mediawikiwidgets.org/Google_Calendar) |
| [GoogleDocTag](https://www.mediawiki.org/wiki/Extension:GoogleDocTag)                | adiciona tag pra inserir google doc               | versão 0.4.0  | versão 0.4 (2014-03-31)            |
| [ParserFunctions](https://www.mediawiki.org/wiki/Extension:ParserFunctions)             | melhora o analisador (parser) com funções lógicas | Versão 1.4.0  | versão 1.6.0 (2014-03-28)          |
| [Widgets](https://www.mediawiki.org/wiki/Extension:Widgets)                     | permite adicionar widgets                         | Versão 1.0    | versão 1.3.0 (agosto 2017)         |
| OggHandler                  | manipulador para arquivos Ogg Theora e Vorbis     |       -       | ARQUIVADA, [nova opção](https://www.mediawiki.org/wiki/Extension:TimedMediaHandler)              |
| Google Maps Extension       | criar mapas na wiki                               | versão 0.9.4  | ARQUIVADA, [nova opção](https://www.mediawiki.org/wiki/Extension:Maps)              |
| [LDAP Authentication Plugin](https://www.mediawiki.org/wiki/Extension:LDAP_Authentication)  | autenticação LDAP                                 | versão 1.2p   | versão 2.1.0 (2014-03-28)          |
| [LockDown](https://www.mediawiki.org/wiki/Extension:Lockdown)                    | restringe acesso para um grupo                    |       -       |                  -                 |
| [Validator](https://www.mediawiki.org/wiki/Extension:Validator)                   | processador de parâmetros para definição          | versão 0.4.13 | versão 2.0.5 (2016-04-04)          |
| [Quiz](https://www.mediawiki.org/wiki/Extension:Quiz)  | permite inserção de quiz na wiki                                 | -   | 1.2.0 (2013-08-13)          |


## Kubernetes Chart Mediawiki e Problemas para Mudança de Idioma

A documentação relacionada a implementação da imagem em nosso kubernetes pode ser encontrada dentro do projeto servicos_kubernetes, com o nome de [mediawiki_att](https://github.com/ctic-sje-ifsc/servicos_kubernetes/tree/master/srv/mediawiki_att)

Ao editar o arquivo LocalSettings.php com intuito de mudar o idioma da mediwiki de "en" para "pt-br" na linha `$wgLanguageCode = "pt-br";`, o pod do kubernetes tornava-se inacessível e ficava reiniciando infinitamente. O motivo, como descobrimos, está atrelado ao trecho a seguir do arquivo [deployment.yaml](https://github.com/kubernetes/charts/blob/master/stable/mediawiki/templates/deployment.yaml):

```
        livenessProbe:
          httpGet:
            path: /index.php
            port: http
          initialDelaySeconds: 120
        readinessProbe:
          httpGet:
            path: /index.php
            port: http
          initialDelaySeconds: 30
        resources:

```

O 'livenessProbe' citado acima é usado pelo kubelet para checar (a cada intervalo de tempo configurado) se o pod está funcionando corretamente, acessando a página descrita na linha `path: /index.php`. Ao mudar o idioma da mediawiki de inglês para português, a página /index.php passa a ser /index.php/Página_principal, fazendo com que o livenessProbre reiniciasse o pod por não conseguir acesso a página.

Para resolver o problema, editamos o arquivo deployment.yaml de forma a mudar o path descrito no livenessProbe para um arquivo dentro da pasta images.

```
           "livenessProbe": {
              "httpGet": {
                "path": "/images/Logoifsc.png",
                "port": "http",
                "scheme": "HTTP"
              },
              "initialDelaySeconds": 120,
              "timeoutSeconds": 1,
              "periodSeconds": 10,
              "successThreshold": 1,
              "failureThreshold": 3
            },
            "readinessProbe": {
              "httpGet": {
                "path": "/images/Logoifsc.png",
                "port": "http",
                "scheme": "HTTP"
              },
```

## Instalação de novas extensões na mediawiki 1.30

É possível ver os testes de todas as extensões listadas abaixo na página [Testes de Extensões](https://cicd.sj.ifsc.edu.br/index.php/Testes_de_Extens%C3%B5es) da nova wiki.

### Cite

A extensão Cite auxilia o usuário na criação de referências e notas de rodapé.
Instalação feita baixando os arquivos da extensão e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `wfLoadExtension( 'Cite' );`

### EmbedVideo

<p>A extensão EmbedVideo adiciona uma parser function necessária para inserir vídeos de diversas plataformas de compartilhamento de vídeo em uma página da wiki. Ele também adiciona suporte a arquivos mp3, mp4 entre outros, locais da mediawiki.</p>
Instalação feita baixando os arquivos da extensão e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `wfLoadExtension( 'EmbedVideo' );`

### GoogleDocTag
<br>A extensão GoogleDocTag insere um documento do Google Docs na página da wiki.</br>
Instalação feita baixando os [arquivos da extensão](https://www.mediawiki.org/wiki/Extension:GoogleDocTag) e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `require_once "$IP/extensions/GoogleDocTag/GoogleDocTag.php";`

### Math
<br>A extensão Math, dependendo da configuração, faz uso do utilitário Texvc para renderização das equações. Este utilitário, por sua vez, não vem instalado junto com a imagem mediawiki da Bitnami. Ao instalar a extensão, em vez de ela mostrar as equações, a wiki devolvia o erro abaixo:</br>
`Falhou ao verificar gramática (O executável <code>texvc</code> não foi encontrado. Consulte math/README para instruções da configuração.)`
<br>Para resolver o problema basta inserir as duas linhas abaixo no arquivo LocalSettings.php: </br>
``$wgMathFullRestbaseURL= 'https://en.wikipedia.org/api/rest_';
$wgDefaultUserOptions['math'] = 'mathml';``
Na primeira linha é apontado o endereço da API necessária pro funcionamento da extensão e na segunda é configurado o uso do Mathoid para renderização padrão das contas de usuário da wiki. O Mathoid utiliza MathJax para converter a entrada texvc no lado do servidor para renderização MathML + SVG. Nota-se que a renderização feita utilizando MathML não tem como resultado uma imagem PNG, diferente do Texvc se configurado para tal. (fonte:https://www.mediawiki.org/wiki/Extension:Math/pt-br)

### ParserFunctions
Adiciona funções úteis ao wikitexto relacionadas a logica e manipulação de strings.
Instalação feita baixando os [arquivos da extensão](https://www.mediawiki.org/wiki/Extension:ParserFunctions) e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `wfLoadExtension( 'ParserFunctions' );`

### Quiz
Permite adicionar quizes em uma página da wiki.
Instalação feita baixando os [arquivos da extensão](https://www.mediawiki.org/wiki/Extension:Quiz) e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `wfLoadExtension('Quiz' );`

### SyntaxHighlighter
Adiciona suporte a realce de sintaxe na wiki.
<br>Depois de instalar praticamente todas as extensões do tipo Syntex Highlight oficiais (que podem ser encontradas para download no site da mediawiki) e ver que nenhuma delas funcionava na versão 1.30.0 da mediawiki que possuímos, a extensão SyntexHighter foi a que salvou. O problema das outras versões é desconhecido, nenhuma informação das páginas de discussões das extensões funcionou.</br>   
<br>Instalação feita baixando os [arquivos da extensão](https://www.mediawiki.org/wiki/Extension:SyntaxHighlighter) e adicionando-os à pasta `/extensoes/SyntaxHighLighter` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `require_once "$IP/extensions/SyntaxHighlighter/SyntaxHighlighter.php";`</br>

### Widgets
<br>Basta fazer download da extensão [Widgets](https://www.mediawiki.org/wiki/Extension:Widgets). Ela criará um novo namespace na wiki. Para adicionar um widget, é preciso criar uma página dentro do namespace **Widget** com o nome do Widget que será usado. </br>
<br>Por exemplo, o Widget Google Calendar:</br>
- Crie uma página chamada **Widget:Google_Calendar**. Nela é preciso colocar todo o código source do Widget na página recém criada. O código pode ser procurado (não estava muito acessível) na página https://www.mediawikiwidgets.org/w/index.php?title=Widget:Google_Calendar&action=edit

### TinyMCE
A extensão TinyMCE, que segue o formato WYSIWYG, facilita a edição de páginas da wiki por ser mais visual e intuitiva. A implementação de um editor WYSIWYG foi sugerida pelo professor M. Moecke.
<br>Foi primeiramente testada a extensão VisualEditor, mas vimos que ela possuía diversas dependências e teríamos que fazer uma nova imagem docker apenas para poder usá-la no nosso ambiente.
A extensão TinyMCE não requer nenhum serviço ou biblioteca para funcionar. </br>
<br>Para instalar basta baixar os arquivos da extensão (link disponível na [página da extensão](https://www.mediawiki.org/wiki/Extension:TinyMCE)) e adicionar a linha `wfLoadExtension( 'TinyMCE' );` ao arquivo LocalSettings.php.</br>
