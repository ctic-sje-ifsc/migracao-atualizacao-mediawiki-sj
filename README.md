
# Migração dos Dados da wiki.sj.ifsc.edu.br Para a Nova Versão da Mediawiki

Nesse repositório é descrito o processo usado para migração do conteúdo da [antiga Wiki do câmpus SJ](https://wiki.sj.ifsc.edu.br/wiki/index.php/P%C3%A1gina_principal) para a [ nova Wiki](https://cicd.sj.ifsc.edu.br/index.php/P%C3%A1gina_principal). 



A antiga wiki encontrava-se na versão 1.16.0 do software open source [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki).
A migração do conteúdo foi feita para a versão mais recente (1.30.0).



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


## Kubernetes chart mediawiki e Problemas para mudança de idioma

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
.
### Cite

Instalação feita por baixando os arquivos da extensão e adicionando-os à pasta `/extensoes` do diretório raiz da instalação do mediawiki. No arquivo LocalSettings.php é adicionado a linha `wfLoadExtension( 'Cite' );`

### VisualEditor
A extensão VisualEditor, que segue o formato WYSIWYG, facilita a edição de páginas da wiki por ser mais intuitiva. A implementação foi sugerida pelo professor M. Moecke 

