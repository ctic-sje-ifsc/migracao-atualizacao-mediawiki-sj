# Migração dos Dados da Antiga Wiki Para a Nova

Nesse repositório é descrito o processo usado para migração do conteúdo da [antiga Wiki do câmpus SJ](https://wiki.sj.ifsc.edu.br/wiki/index.php/P%C3%A1gina_principal) para a [ nova Wiki](https://wiki.sj.ifsc.edu.br/wiki/index.php/P%C3%A1gina_principal). 

A antiga wiki encontrava-se na versão 1.16.0 do software open source [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki).
A migração do conteúdo foi feita para a versão mais recente (1.29.1).


Abaixo tabela com os antigos plugins, cujas instalações foram necessárias na nova versão da Wiki:

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
| [Tooltip](https://www.mediawiki.org/wiki/Extension:Tooltip)                     | acrescenta marcas (tooltips) ao texto             | versão 0.6.0  | versão 0.6.0                       |
| [Widgets](https://www.mediawiki.org/wiki/Extension:Widgets)                     | permite adicionar widgets                         | Versão 1.0    | versão 1.3.0 (agosto 2017)         |
| OggHandler                  | manipulador para arquivos Ogg Theora e Vorbis     |       -       | ARQUIVADA, [nova opção](https://www.mediawiki.org/wiki/Extension:TimedMediaHandler)              |
| Google Maps Extension       | criar mapas na wiki                               | versão 0.9.4  | ARQUIVADA, [nova opção](https://www.mediawiki.org/wiki/Extension:Maps)              |
| [LDAP Authentication Plugin](https://www.mediawiki.org/wiki/Extension:LDAP_Authentication)  | autenticação LDAP                                 | versão 1.2p   | versão 2.1.0 (2014-03-28)          |
| [LockDown](https://www.mediawiki.org/wiki/Extension:Lockdown)                    | restringe acesso para um grupo                    |       -       |                  -                 |
| [Validator](https://www.mediawiki.org/wiki/Extension:Validator)                   | processador de parâmetros para definição          | versão 0.4.13 | versão 2.0.5 (2016-04-04)          |
