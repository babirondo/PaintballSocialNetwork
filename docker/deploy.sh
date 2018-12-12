#!/bin/bash
HOST=172.17.0.2
USER=bruno
GIT_REPOSITORY=https://github.com/babirondo/PaintballSocialNetwork.git
SYSTEM_FOLDER=PaintballSocialNetwork
SYSTEM_FOLDER_NOVO=PaintballSocialNetwork_2
SYSTEM_FOLDER_TEMP=PaintballRelease


#ssh -tt $USER@$HOST;
pwd;
cd /var/www/html;
pwd;
mkdir /var/www/html/$SYSTEM_FOLDER_TEMP;
echo "pasta temporaria criada"
cd $SYSTEM_FOLDER_TEMP
pwd
echo "rodando git clone"
git clone $GIT_REPOSITORY
cd $SYSTEM_FOLDER
pwd
composer install
composer update
cd /var/www/html/
mv $SYSTEM_FOLDER_TEMP/$SYSTEM_FOLDER $SYSTEM_FOLDER_NOVO
rm -rf $SYSTEM_FOLDER
mv   $SYSTEM_FOLDER_NOVO $SYSTEM_FOLDER
rm -rf  $SYSTEM_FOLDER_TEMP


#adicionar permissao de escrita na pasta pos deploy
