all: fresh build install

fresh:
	git pull

install: 
	echo install
	
build:
	echo build

clean:
	rm -rf debian/monitoring-to-redmine-notify
	rm -rf debian/*.substvars debian/*.log debian/*.debhelper debian/files debian/debhelper-build-stamp

deb:
	debuild -i -us -uc -b

