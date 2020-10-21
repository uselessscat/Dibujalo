# Dibujalo
Atrévete a dibujar a ciegas y comparte el resultado con tus amigos :)

# Instalacion

    docker build -t dibujalo -f dockerfile .
    docker run -p 80:80 -d -v /$(pwd)/src/:/var/www/src/ dibujalo

    docker run --rm -ti -v /$(PWD)/src/:/app composer update --ignore-platform-reqs