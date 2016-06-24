# Installation

1. Setup the container

__a) via docker:__
```bash
# Build the image
docker build -t travisci-board ./
docker run \
    --env TRAVISCI_FEEDS= \
        https://api.travis-ci.org/repos/travis-ci/travis-ci/builds.json, \
        https://api.travis-ci.org/repos/sveneisenschmidt/selenium-server-standalone/builds.atom \
    --publish 9000:80 \
    travisci-board
```

__b) via docker-compose:__
```bash
# Prepare the supplied docker compose configuration
cp docker-compose.yml.dist docker-compose.yml
vi docker-compose.yml # Manually set TRAVISCI_FEEDS
# Startup
docker-compose up -d
```
