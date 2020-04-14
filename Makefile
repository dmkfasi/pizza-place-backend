GITHUB=github
APPHOST=heroku
LOCAL=master

all: commit deploy

commit:
	git push -v $(GITHUB) $(LOCAL)

migrate:
	php artisan migrate:refresh

seed:
	php artisan db:seed 

deploy:
	git push -v $(APPHOST) $(LOCAL)

