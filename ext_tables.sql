CREATE TABLE tx_inv_domain_model_clothes (
	name varchar(255) NOT NULL DEFAULT '',
	description text,
	size int(11) DEFAULT '0' NOT NULL,
	season int(11) DEFAULT '0' NOT NULL,
	images int(11) unsigned NOT NULL DEFAULT '0',
	slug varchar(255) NOT NULL DEFAULT '',
	location int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_inv_domain_model_location (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_inv_domain_model_clothes (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

CREATE TABLE tx_inv_domain_model_clothes (
	 size varchar(255) NOT NULL DEFAULT '0',
	 season varchar(255) NOT NULL DEFAULT '0',
);
