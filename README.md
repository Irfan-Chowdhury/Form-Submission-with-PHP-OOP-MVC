<div align='center'>

# Simple Form Submission 

</div>

## Technology Used
- PHP : v-8.1
- MySQL : 10.4.32-MariaDB
- phpMyAdmin
- Bootstrap : v-4
- jQuery, Ajax
- SweetAlert2


## How to run this project ?


#### Step-1: At first clone the repository 

```bash
git clone https://github.com/Irfan-Chowdhury/Form-Submission-with-PHP-OOP-MVC.git
```

#### Step-2: Composer Update
After cloning the project, you may need to update Composer for configuration purposes. Please open the terminal in the project directory and run the following command :


```bash
composer update
```

Make sure that Composer is installed on your local machine before running the command.

#### Step-3 : Import DB
Please check the Database named `oop_mvc_simple_form.sql` with this script.

Please import this db in your phpMyAdmin

#### Step-4: DB Credentials

Please upen the file from `project_root_directory/config/config.php` and update the your db credentials.

```bash
define("DB_HOST", "localhost");
define("DB_USER", "your_username");
define("DB_PASS", "your_password");
define("DB_NAME", "database_name");
```



#### Step-5: 
Open your Terminal on that project directory.

Run this command - 

```bash
cd public
```

and again run this command

```bash
php -S localhost:9999
```

#### Step-6 : Site Visit
Open browser and visit that pages.

- For Home Page

```bash
http://localhost:9999/

```

<img src="https://snipboard.io/5XEfVR.jpg">


</br></br>

- For Create Page

```bash
http://localhost:9999/create

```

<img src="https://snipboard.io/kWS3o7.jpg">



## Installation Video
Click Here : https://drive.google.com/file/d/1CS8ADiuENbHjO9kmRq2MjEQSwrhnBiRJ/view?usp=sharing






