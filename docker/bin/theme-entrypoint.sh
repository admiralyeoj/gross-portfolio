#!/bin/bash
# rm -rf node_modules/
# ls -al node_modules/
yarn install --verbose
yarn dev
exec "$@"