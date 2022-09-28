CREATE TABLE tx_inv_domain_model_item (
	size int(11) DEFAULT '0' NOT NULL,
	season int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_inv_domain_model_location (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_inv_domain_model_shop (
	name varchar(255) NOT NULL DEFAULT '',
	link varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_inv_domain_model_item (
	name varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT '',
	image int(11) unsigned NOT NULL DEFAULT '0',
	price double(11,2) NOT NULL DEFAULT '0.00',
	description text NOT NULL DEFAULT '',
	location int(11) unsigned DEFAULT '0',
	shop int(11) unsigned DEFAULT '0',
	tx_extbase_type varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_inv_domain_model_item (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_inv_domain_model_item (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

CREATE TABLE tx_inv_domain_model_item (
	 size varchar(255) NOT NULL DEFAULT '',
	 season varchar(255) NOT NULL DEFAULT '',
);
