# Example WordPress API Plugin
An example plugin for [haruncpi/wp-api](https://github.com/haruncpi/wp-api) composer package.

## Installation
1. Download the ZIP file from this repository by clicking [here](https://github.com/haruncpi/api-plugin/archive/refs/heads/master.zip). After downloading, extract the contents and rename the folder to `api-plugin`.
2. Place the `api-plugin` folder in the `wp-content > plugins` directory of your WordPress project.
3. Open a terminal or command prompt and navigate to the `api-plugin` folder. Run the command `composer install` to install the necessary dependencies.
4. Go to the "Plugins" list in the WordPress dashboard menu, and activate the plugin.

## API Base URL
wp-admin > settings > permalink
 - When pretty permalink: `yourdomain.com/wp-json/api-plugin/v1`
 - When plain permalink: `yourdomain.com?rest_route=/api-plugin/v1`