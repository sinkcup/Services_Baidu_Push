package:
	@pear channel-discover sinkcup.github.io/pear; onion build --pear;
#@php pyrus.phar channel-discover sinkcup.github.io/pear; onion build --pear;

install:
	@pear install Services_Apple_PushNotification-*.tgz;
#@php pyrus.phar install Services_Apple_PushNotification-*.tgz;

test:
	phpunit ./tests/

