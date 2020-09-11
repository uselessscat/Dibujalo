# Dibujalo
Atrévete a dibujar a ciegas y comparte el resultado con tus amigos :)

# Instalacion

    docker build -t dibujalo .
    docker run -p 80:80 -d -v /$(pwd)/src/:/var/www/html/ dibujalo