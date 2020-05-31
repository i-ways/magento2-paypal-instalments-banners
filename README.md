# Magento 2 PayPal Instalments Banners

PayPal Instalments Banners is a solution where PayPal offers to your customers the possibility to preview calculated instalments as individual payment option on every activated shop area, where its banner is being rendered. Through a click on it a popup appears, showing desired information, based on current cart items price sum and currently viewed product. This option is perfect for higher priced items.
IMPORTANT: Customers aren’t able to proceed any payment through those banners.


## Requirements

- Magento Community Edition v2.3.2 or newer
- PHP v7.2.0 or newer
- PayPal Merchant Credentials


## Installation

In order to install this module with composer, please edit or create “repositories” entry in composer.json file:

```
{
	"repositories": [
		{
			"url": "https://github.com/i-ways/magento2-paypal-instalments-banners",
			"type": "vcs"
		}
	]
}
```

Then add following line to “require” entry in the same file:

```
{
	"require": {
		"iways/module-paypal-instalments-banners": “~1.0.1”
	}
}
```

or let composer do it for you with command “composer require iways/module-paypal-instalments-banners”.


Now enable the module using Magento 2 CLI from your application root:

```
bin/magento module:enable --clear-static-content Iways_PaypalInstalmentsBanners
```

In order to initialize database updates please run following command afterwards:

```
bin/magento setup:upgrade
```

Depending on your Magento 2 installation setup, you may want to run following additional command:

```
bin/magento setup:di:compile
```


At this point Paypal Instalments Banners modul should be installed, correctly enabled with default configuration and ready to use.
You may have to still enter a valid PayPal Merchant Client ID in Magento’s Administration Panel, save configuration and flush your Magento’s cache in order to see banners being rendered on frontend.
See configuration options under Stores / Configuration / PAYPAL / Instalments Banners, possible values for each area are none (no rendering), white, gray, blue and black.


## Filesystem

```
.
├── Block
│   ├── Widget
│   │   └── Banner.php
│   ├── Head.php
│   └── Logo.php
├── Helper
│   └── Data.php
├── Model
│   ├── System
│   │   └── Config
│   │       └── Source
│   │           └── Banner
│   │               ├── Color.php
│   │               └── Ratio.php
│   └── ConfigProvider.php
├── Observer
│   └── Admin
│       └── System
│           └── Config
│               └── Changed
│                   └── Section
│                       └── Validate.php
├── etc
│   ├── adminhtml
│   │   ├── events.xml
│   │   └── system.xml
│   ├── frontend
│   │   └── di.xml
│   ├── acl.xml
│   ├── config.xml
│   ├── module.xml
│   └── widget.xml
├── i18n
│   └── de_DE.csv
├── view
│   ├── adminhtml
│   │   └── web
│   │       └── images
│   │           ├── icon_32x32.png
│   │           └── icon_64x64.png
│   └── frontend
│       ├── layout
│       │   ├── catalog_product_view.xml
│       │   ├── catalog_product_view_type_bundle.xml
│       │   ├── catalog_product_view_type_configurable.xml
│       │   ├── catalog_product_view_type_downloadable.xml
│       │   ├── checkout_cart_index.xml
│       │   ├── checkout_index_index.xml
│       │   └── default.xml
│       ├── templates
│       │   ├── widget
│       │   │   └── banner.phtml
│       │   └── logo.phtml
│       └── web
│           ├── css
│           │   └── iways-paypalinstalmentsbanners.css
│           ├── images
│           │   ├── logo.png
│           │   ├── logo_hq.png
│           │   ├── logo_original.png
│           │   └── paypal_logo.png
│           ├── js
│           │   ├── view
│           │   │   └── banner.js
│           │   └── iways-paypalinstalmentsbanners.js
│           └── template
│               └── widget
│                   └── banner.html
├── README.md
├── RELEASE_NOTES.txt
├── composer.json
└── registration.php
```


## Issues

Please use our Servicedesk at https://support.i-ways.net/hc/de
