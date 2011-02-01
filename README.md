# Project Template

*A quick way to start new projects with basic configuration*

- **Version:** 0.6.0
- **URL:** <http://github.com/synapsestudios/kohana-projecttemplate>

## Description
This repository is intended to quickly set up a basic project with all the initial repetitive tasks done for you.

## Submodules

- ### system
    - **url** : `git://github.com/synapsestudios/kohana-core`
    - **version** : `3.0.x`
- ### modules/acl
	- **url** : `git://github.com/synapsestudios/kohana-acl`
	- **version** : `dev/1.0.x`
- ### modules/auth
	- **url** : `git://github.com/synapsestudios/kohana-auth`
	- **version** : `3.0/develop`
- ### modules/csrf
	- **url** : `git://github.com/synapsestudios/kohana-csrf`
	- **version** : `develop`
- ### modules/database
	- **url** : `git://github.com/synapsestudios/kohana-database`
	- **version** : `3.0/develop`
- ### modules/email
	- **url** : `git://github.com/synapsestudios/kohana-email`
	- **version** : `develop`
- ### modules/errors
	- **url** : `git://github.com/synapsestudios/kohana-errors`
	- **version** : `develop`
- ### modules/image
	- **url** : `git://github.com/synapsestudios/kohana-image`
	- **version** : `3.0/develop`
- ### modules/kostache
	- **url** : `git://github.com/synapsestudios/kohana-kostache.git`
	- **version** : `synapse-unstable`
	- **notes** : `The reason we use the synapse-unstable branch is because we have updated to a version of mustache that allows for lambda functions, and we have implemented a few changes that we think should be in zombor's official module. We will switch back to zombor's module as soon as they get applied.`
- ### modules/media
	- **url** : `git://github.com/synapsestudios/kohana-media`
	- **version** : `dev/1.0.x`
- ### modules/notices
	- **url** : `git://github.com/synapsestudios/kohana-notices`
	- **version** : `dev/3.0.x`
- ### modules/orm
	- **url** : `git://github.com/synapsestudios/kohana-orm`
	- **version** : `zeelot-3.1.0`
	- **notes** : This branch had the initial work for ORMs changes to be used in 3.1.0, however they are backwards compatible with kohana 3.0.x so we used them on these projects as well. There are slight differences between this branch and what officially ended up getting into 3.1.0 but it is still a huge improvement from the 3.0.x ORM in our opinion.`
- ### modules/pagination
	- **url** : `git://github.com/synapsestudios/kohana-pagination`
	- **version** : `3.0/develop`
- ### modules/unittest
	- **url** : git@github.com:synapsestudios/kohana-unittest.git
	- **version** : `3.0/develop`
- ### modules/userguide
	- **url** : git@github.com:synapsestudios/kohana-userguide.git
	- **version** : `3.0/develop`
- ### modules/yform
	- **url** : git@github.com:synapsestudios/kohana-yform.git
	- **version** : `develop`
