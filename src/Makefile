CONFIG=config.php

all:

clean:
	rm $(CONFIG)

addConfig:
	@echo "<?php" >> $(CONFIG)
	@printf "if(!isset(\044_GET['install']))" >> $(CONFIG)
	@echo "	header('location: install/?install=1');" >> $(CONFIG)
	@echo "Created the $(CONFIG) file."


resetEnv:
	@make clean
	@make addConfig
	@echo "Reset enviorment done"
	
create:
	@make addConfig
	@echo "Created the necesary files."

git-start:
	@git update-index --assume-unchanged $(CONFIG)
	@echo "Initialiced the necesary files"

git-reset:
	@git update-index --no-assume-unchanged $(CONFIG)
	@echo "Unitialiced the necesary files"


scss:
	@scss Theme/SCCore/css/theme.scss Theme/SCCore/css/theme.css
	@echo "Compiling SCSS Files"