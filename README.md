![Viatic CMS](viatic-cms-logo.png)

# Viatic CMS

A customised version of [OctoberCMS](https://octobercms.com) for creating sites for VIA Creative. Includes the base template setup and ready for development.


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

- [Homebrew](https://brew.sh)
- PHP 7.0+ - `brew install php`
- [Composer](https://getcomposer.org/)
- [Yarn](https://yarnpkg.com/lang/en/docs/install/)/[NPM](https://nodejs.org/en/download/) (Both recommended)
- [Laravel Valet](https://laravel.com/docs/5.8/valet#installation) or another local dev environment with mysql databases

### Installing

Follow these steps to install and setup Viatic for a new project.


#### 1. Install ViaticCMS

Clone or copy this project into the location of your other sites and rename it to the new site and delete the current .git folder.

Create a local database for this site and edit the .env file with the correct database name.

Open Terminal and `cd` into the new website folder

```
cd ~/Sites/new-site
```

Once in the site filder, run the following command to install all dependancies
```
composer install
```


#### 2. Setup Theme

Enter the theme folder with this command
```
cd themes/via-base
```

Install any dependancies
```
yarn
```


#### 3. Setup Database

Go back to the site root folder and install the database with this command:

```
php artisan october:up
```

This will install the tables for the CMS and all plugins that have been left for installation.

It will also create a user that can be used to login with the username & password as `admin`.


#### 4. Install Viatic Settings

First move the `ViaticSetup.php` in the root folder to `Modules\Backend\Database\Seeds`.

Install and setup all Viatic settings by running the db seeder with this command
```
php artisan db:seed --class="\Backend\Database\Seeds\ViaticSetup"
```


#### 5. Setup Dashboard

On the admin dashboard, add any Widget and sae the layout as the default using the 'Manage Widgets' button.

Open the database in Sequel Pro or PHPmyAdmin and select the `system_parameters` table.

You should see `default.dashboard`, update its value with this JSON

```json
{"welcome":{"class":"Backend\\ReportWidgets\\Welcome","sortOrder":50,"configuration":{"title":"Welcome","ocWidgetWidth":"6","ocWidgetNewRow":null}},"activeTheme":{"class":"Cms\\ReportWidgets\\ActiveTheme","sortOrder":70,"configuration":{"title":"Website","ocWidgetWidth":"3","ocWidgetNewRow":null}},"report_container_dashboard_3":{"class":"JanVince\\SmallContactForm\\ReportWidgets\\NewMessage","configuration":{"ocWidgetWidth":"3","ocWidgetNewRow":null},"sortOrder":71},"report_container_dashboard_4":{"class":"JanVince\\SmallContactForm\\ReportWidgets\\Messages","configuration":{"ocWidgetWidth":"3"},"sortOrder":72},"report_container_dashboard_6":{"class":"RainLab\\GoogleAnalytics\\ReportWidgets\\TrafficSources","configuration":{"title":"Traffic Sources","reportSize":"150","legendAsTable":1,"days":"30","number":"10","displayDescription":0,"ocWidgetWidth":"3","ocWidgetNewRow":null,"center":null},"sortOrder":74},"report_container_dashboard_7":{"class":"RainLab\\GoogleAnalytics\\ReportWidgets\\Browsers","configuration":{"title":"Browsers","reportHeight":"200","legendAsTable":1,"days":"7","displayDescription":0,"ocWidgetWidth":"3","ocWidgetNewRow":null},"sortOrder":75},"report_container_dashboard_8":{"class":"RainLab\\GoogleAnalytics\\ReportWidgets\\TrafficOverview","configuration":{"title":"Traffic overview","days":"30","ocWidgetWidth":"6"},"sortOrder":76}}
```

This will setup the dashboard with all of the analytics data. You will need to reset the dashboard layout before you see the new default. Analytics will need setup in the Settings tab before they will show properly.


#### 6. Create gitignore

In the root folder, duplicate and rename the `.gitignore copy` file to `.gitignore`.

In the via-base theme folder, duplicate and rename the `.gitignore copy` file to `.gitignore`.


## Editing the theme

The base theme uses Bootstrap 4 and some custom helper classes and is compiled with gulp.

To make changes `cd` into the theme folder

```
cd /themes/via-base
```

And watch for changes with
```
gulp watch
```


## Deployment

Forge should be used for deploying all updates.

Can be manually deployed by connecting to the server using SSH. Make sure you have ran `gulp` to update theme files and have pushed the updates, then just connect to the server, `cd` into the website's folder and run `git pull` assuming there are no conflicts.


## Authors

* **Martin Pollock** - *Initial Viatic and Theme creation* - [MarpoOcknew](https://github.com/MarpoOcknew)


## Version History

### Initial Page Builder Release 2.0

```
- Added theme support for [Viatic Blocks](https://github.com/viacreativedev/Viatic-Blocks)
    - Update default layout to use only blocks
    - Add default seo and meta tag fields to layout
    - Updated variables and mixins to allow for 4 colours + gray with 2 shades darker and lighter for each
```

### Theme Settings Release 1.3

```
- Added some default settings to the theme.yaml
    - Add general details
    - Add contact details
    - Add social links
```

### Quick Install Release 1.2

```
- Moved a lot of the manual setup to a seeder to make installation much quicker
```

### Github Release 1.1

```
- Cleaned up and added to github repo
```

### Initial Release 1.0

```
- Created the original version of this project
- Added updated version of the old via october base theme with scss support
```
