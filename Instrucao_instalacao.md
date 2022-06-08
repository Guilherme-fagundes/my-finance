# My Finance - Sistema de controle de gastos

### Instruções para instalação

Entre dentro da pasta do projeto My_Finance e instale as dependencias via npm:

```bash
npm install
```
e em seguida:
```bash
npm run prod
```

Crie o arquivo .env e cole o conteúdo abaixo dentro e salve-o

```.env
APP_NAME="My Finance"
APP_ENV=production
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_finance
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=

```

Instale as dependencias do composer:
```bash
composer install
```

Rode o comando para gerar o APP_KEY:
```bash
php artisan key:generate
```

Configure o arquivo .env conforme suas configurações.

### Configuraçao para disparo de email:

Para disparar informe os dados no arquivo .env

```.env
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```
Para isso é possivel usar as suas credenciais do serviço Mailtrap. 
<a href="https://mailtrap.io" target="_blank">Clique aqui</a> para acsessa-lo e crie sua conta ou entre pelo google.

Após entrar na plataforma vá até tests > Inboxes e informe as suas credenciais de SMTP.

```.env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=informe a porta disponibilizada
MAIL_USERNAME='Informe o usuario disponibilizado'
MAIL_PASSWORD='informe a senha disponibilizada'
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```



