sudo /etc/init.d/postgresql start &
cd /usr/local/projects/php/lpesecours/
google-chrome --app "127.0.0.1:8000/recetteMoMo" &
php artisan serve --host 0.0.0.0

#echo "export PATH=\${PATH}:$(pwd)" >> ~/.bashrc
