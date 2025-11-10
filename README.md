### :cat: Site de adoção - Projeto Integrador T.I 26
***
**Autores:** Brian , Tais

#### :bulb: Proposta
- Site de adoção de animais
 
#### :sparkles: Funcionabilidades
- Cadastrar Usuario e animais
- Fazer login
- Ver informações cadastradas em cards
- Editar e excluir informações cadastradas 


#### :sparkles: Objetivo
- Conectar as pessoas que querem doar com as que querem encontrar seus novos queridos bichinhos de estimação, alem de quem teve seu animal desaparecido ter a possibilidade de encontra-lo. 

#### :file_folder: Estrutura do Projeto 
```

🗂️quaselar/
├──📄🐘 index.php                           # Tela inicial onde tem os botões principais e a exibição dos cards dos animais que estão para a adoção
│    
├──📂template
│   ├──📄🐘header.php                       # cabeçalho do site
│   ├──📄🐘footer.php                       # final do site 
│   └──📂🧑‍💼admin
│       ├──📄🐘admin_index.php              # painel de controle do administrador   
│       ├──📄🐘adm_cad_usuario.php          # conexao com o banco para fazer o cadastro do usuario como admin
│       ├──📄🐘adm_deletar_procurados.php   # conexao com o banco para deletar o animal desaparecido como admin
│       ├──📄🐘adm_deletar_usuario.php      # conexao com o banco para deletar o cadastro do usuario como admin
│       ├──📄🐘adm_edit_procurados.php      # conexao com o banco para Editar o cadastro do animal desaparecido como admin
│       ├──📄🐘adm_cad_procurados.php       # conexao com o banco para faz o cadastro do animal desaparecido como admin
│       ├──📄🐘adm_edit_usuario.php         # conexao com o banco para Editar o cadastro do usuario como admin
│       ├──📄✏️style.css🎨                  # estilo para o painel do administrador
│       └──📄🟡script.js                    
│    
├── 📂🖼️img
│   ├──🖼️🦊imagem da logo                      
│   ├──🖼️🦊fundo animado
│   ├──🖼️🦊imagem padrão quando não tem foto     
│   └──🖼️🦊imagem usada no sobre nós 
│
│    
├── 📂🅰️font
│    ├──🔠 OpenSans-VariableFont_wdth,wght.ttf    
│    └──🔠 WorkSans-VariableFont_wght.ttf
│    
├── 📂css
│   ├──📄✏️index.css🎨                      # estilo para a página principal
│   ├──📄✏️header.css🎨                     # estilo para a header da pagina
│   ├──📄✏️tela_cad_entrar_usuarios.css🎨   # estilo para o formúlario de usúarios
│   ├──📄✏️tela_cad_pets.css🎨              # estilo para o formúlario de adocão de animais
│   ├──📄✏️tela_cad_procuradoscss🎨         # estilo para o formúlario de perdidos de animais
│   ├──📄✏️tela_config_perfil.css🎨         # estilo para a tela de configurações de usuario    
│   ├──📄✏️tela_perfil.css🎨                # estilo para a tela de perfil do usuario   
│   └──📄✏️tela_exibicao_procurados.css🎨   # estilo para a exibição de cards do animais desaparecidos 
│    
│    
│    
│    
├──📂js
│   ├──📄🟡header.js                       # monta a estrutura do no menu-hambuger 
│   ├──📄🟡script.js                       # monta estrutura de de telas moveis          
│   ├──📄🟡validacoes-animal.js            # validações do formúlario de adocão e do formulario de procurados
│   └──📄🟡validacoes.js                   # validações do formúlario de usúarios
│     
├──📂.env
│   └──📄🔒* dados do banco de dados *🥷
│    
├── 📂class
│   ├──📄Adocao.php                          # Classe onde tem funções de crud para os animais da adoção
│   ├──📄BancoDeDados_conexao.php            # Classe onde tem a conexão de banco de dados para usar nas outras classes e arquivos
│   ├──📄Procurados.php                      # Classe onde tem as funções de crud para os animais que estão sendo procurados
│   └──📄Usuario.php                         # Classe onde tem as funções de crud para os usuarios que vão utiizar o site
│                             
│    
├──📄🐘 tela_cad_pets.php                   # Formulario de cadastro dos animais que estão para a adoção
├──📄🐘 cad_pets.php🐶                     # Conexão com a classe com crud para a realização do cadastro de dados e imagens. 
│    
├──📄🐘 tela_cad_procurados.php             # Formulario de cadastro dos animais que estão sendo procurados        
├──📄🐘 cad_procurados.php🔍               # Conexão com a classe com crud para a realização do cadastro de dados e imagens. 
│    
├──📄🐘 tela_cad_entrar_usuarios.php        # Formulario de cadastro dos usuarios e a tela de login   
├──📄🐘 cad_entrar_usuario.php              # Conexão com a classe com crud para a realização do cadastro do usuario
├──📄🐘 login.php                           # Conexao com a classe de banco de dados e a condição para o login ser realizado                    
│    
├──📄🐘 tela_exibicao_procurados.php        # Tela de exibição dos cards dos animais que estão sendo procurados e o modal com as infomações
│  
├──📄🐘 tela_perfil.php        # Tela onde tem os botões de cadastro, edição e exclusão dos animais e os cards exibindo as imagens
├──📄🐘 tela_perfil_adocao_editar            #Tela do Formulario para edição do cadastro do animal para doacao
├──📄🐘 cad_editar_perfil_adocao.php         # Conexão com a classe para fazer o update das infomações do formulario doacao
├──📄🐘 cad_perfil_deletar_adocao.php    # Conexão com a classe para fazer a exclusão dos dados cadastrados do animal para doacao
├──📄🐘 tela_perfil_procurados_editar.php   #Tela do Formulario para edição do cadastro do animal procurado
├──📄🐘 cad_editar_perfil_procurado.php     # Conexão com a classe para fazer o update das infomações do formulario de procurados
└──📄🐘 cad_perfil_deletar_procurado.php     # Conexão com a classe para fazer a exclusão dos dados cadastrados do animal procurado

```
