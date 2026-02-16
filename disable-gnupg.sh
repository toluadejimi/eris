#!/bin/bash
# Disables the gnupg PHP extension to remove the startup warning
sudo sed -i.bak 's/^extension=/; extension=/' /usr/local/etc/php/8.3/conf.d/ext-gnupg.ini && echo "Done. gnupg disabled. Run 'php -v' to verify."
