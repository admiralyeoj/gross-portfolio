#!/bin/sh

set -eu

target_dir="${1:-/var/www/html/web/app}"
version="${PG4WP_VERSION:-3.3.1}"
release_tag="v${version#v}"
destination="${target_dir}/pg4wp"

if [ -f "${destination}/core.php" ] && [ -d "${destination}/rewriters" ]; then
  exit 0
fi

tmpdir="$(mktemp -d)"
archive="${tmpdir}/pg4wp.zip"
url="https://github.com/PostgreSQL-For-Wordpress/postgresql-for-wordpress/archive/refs/tags/${release_tag}.zip"

echo "PG4WP version: ${release_tag}"
echo "Downloading: ${url}"

curl -fsSL "${url}" -o "${archive}"
unzip -q "${archive}" -d "${tmpdir}"

echo "Extracted directories:"
find "${tmpdir}" -maxdepth 3 -type d | sort

src="$(find "${tmpdir}" -type f -name core.php -path '*/pg4wp/core.php' | head -n 1)"

echo "Detected core.php path: ${src:-<none>}"

if [ -n "${src}" ]; then
  src="$(dirname "${src}")"
fi

if [ -z "${src}" ] || [ ! -d "${src}" ]; then
  echo "PG4WP source not found in downloaded archive." >&2
  exit 1
fi

rm -rf "${destination}"
mkdir -p "${target_dir}"
cp -R "${src}" "${destination}"
chmod -R 755 "${destination}"

rm -rf "${tmpdir}"
