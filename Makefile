makeLogFile:
	@echo "make log file"
	cd log && touch development.log
	cd log && chmod 666 development.log

removeContentInLogFile:
	@echo "remove content in log file"
	echo '' > log/development.log
