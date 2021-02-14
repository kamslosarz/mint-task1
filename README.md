Requirements:

    php 8.0 with 
    "ext-curl": "*",
    "ext-json": "*",
    "ext-mbstring": "*",
    composer 2.0

Usage:

first create the .env based on .env.dist file, for example:

    TREE_FILE=dataset/tree.json
    TREE_MAX_DEPTH=1024

then:

    composer install
    php bin/tree.php "input file"
    php bin/tree.php tests/fixtures/list.json

tests

    composer install --dev
    php vendor/bin/phpunit -c tests/phpunit.xml 
