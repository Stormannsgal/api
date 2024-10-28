# Stormannsgal - Das Projekt vom Größenwahn getrieben

## Installation

1. auschecken: `git clone git@github.com:Stormannsgal/stormannsgal-api.git`
2. Docker Container hochfahren: `docker-compose up -d`
3. Abhängigkeiten installieren: `docker-compose exec php composer install`
4. Datenbank vorbereiten:
   - `docker-compose exec php composer run doctrine migrations:sync-metadata-storage`
   - `docker-compose exec php composer run doctrine migrations:migrate`
5. Informationen für SwaggerUI erstellen: `docker-compose exec php composer run openapi`

Und das war es auch schon. SwaggerUI ist über http://localhost/api/docs/ erreichbar.
Sonstige Services siehe composer.json -> scripts

## Zusätzliche Informationen

Texte auf der Entwicklungsplattform sind auf Deutsch gehalten.
Es spricht aber nichts dagegen, Fragen, Antworten oder Ähnliches in Englisch zu stellen.

# unsupported Script

Sie finden ein Skript namens `sg` unter `/bin`. Dieses bietet Möglichkeiten, das Projekt zu kontrollieren

- `./bin/sg setup` => startet den Docker-Container, führt composer install aus und befüllt die Datenbank
- `./bin/sg start` => startet den Docker-Container
- `./bin/sg restart` => startet den Docker-Container neu
- `./bin/sg stop` => stopt den Docker-Container
- `./bin/sg reset` => Datenbank neu erstellen
- `./bin/sg reset vendor` => Vendor Ordner neu erstellen
- `./bin/sg reset all` => System komplett zurück setzen
- `./bin/sg composer` => Composer mit eigenem Parameter ausführen z.B. `./bin/sg composer install`
- `./bin/sg php` => Befehle im php-Container ausführen, z.B. `./bin/sg php php -v`

---

# Stormannsgal - The project driven by megalomania

## Installation

1. check out: `git clone git@github.com:Stormannsgal/stormannsgal-api.git`
2. boot up Docker container: `docker-compose up -d`.
3. install dependencies: `docker-compose exec php composer install`.
4. prepare database:
   - `docker-compose exec php composer run doctrine migrations:sync-metadata-storage`.
   - `docker-compose exec php composer run doctrine migrations:migrate`.
5. create information for SwaggerUI: `docker-compose exec php composer run openapi`.

And that's it. SwaggerUI is accessible via http://localhost/api/docs/.
Other services see composer.json -> scripts

## Additional information

Texts on the development platform are in German.
However, there is no reason why questions, answers or similar should not be provided in English.

# unsupported Script

You will find a script called `sg` under `/bin`. This offers possibilities to control the project

- `./bin/sg setup` => start the docker container, run composer install and seed Database Data
- `./bin/sg start` => start the docker container
- `./bin/sg restart` => restart the docker container
- `./bin/sg stop` => stop the docker container
- `./bin/sg reset` => clean up Database
- `./bin/sg reset vendor` => clean up vendor folder
- `./bin/sg reset all` => clean up system completely
- `./bin/sg composer` => run composer with own param e.g. `./bin/sg composer install`
- `./bin/sg php` => run commands in php container e.g. `./bin/sg php php -v`
