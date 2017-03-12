# H1-reports-offline
Web application and scrappers for HackerOne reports &amp; bounty programs

## How to setup

1. Clone this repository by executing ```git clone https://github.com/JoaquinRMtz/H1-reports-offline.git``` .
2. Execute ```composer install``` to install all the dependencies.
3. Execute ```php artisan key:generate``` to generate the web application key.
4. Change the name of ```.env.example``` to ```.env``` and configure with your MySQL settings.
5. Import the ```database.sql``` file to a MySQL database.
6. Edit the ```bounty_programs_scrapper.py``` file, fill the MYSQL_* variables with your MySQL settings and execute ```python bounty_programs_scrapper.py``` to scrape all bug bounty programs registered.
7. Edit the ```reports_scrapper.py``` file, fill the MYSQL_* variables with your MySQL settings and execute ```python reports_scrapper.py``` to scrape all bug reports.
8. Execute ```php artisan serve``` to start the web application.

Now you can only do step 8 everytime you want to see a report or bounty program no matter if it is offline.
Steps 1-7 needs internet.
