# My labs in PHP for the subject "Web technologies (Part 1)" :heavy_dollar_sign:

:mortar_board: I did these labs in the second year of university in the fourth semester.

:computer: What did I use to develop these labs:
- PhpStorm 2021.3.2
- PHP 8.0.13
- Apache 2.4.51
- MySQL 5.7.36
- phpMyAdmin 5.1.1

_______________________________________________________________________________________

### :heavy_check_mark: Lab 2 - Basic operations in PHP
task_01, 02, 04, 05 - getting parameters via GET request.
- task_01 - Definition for each data type parameter (float, integer, string).
- task_02 - Generation of an HTML table with the specified number of rows.
- task_03 - Displaying a multidimensional array in the browser in such a way that elements of different levels are displayed in different colors.
- task_04 - Calculation of the sum of digits in a number.
- task_05 - Finding the longest word.

_______________________________________________________________________________________

### :heavy_check_mark: Lab 3 - Typical operations in PHP
- task_01 - Getting an arbitrary list of cities via a GET request, eliminating duplicates, sorting the final set of cities alphabetically (in ascending order).
- task_02 - Receiving arbitrary text via a GET request and displaying it in the browser with the following changes: every third word must be uppercase, every third letter of all words must be purple.
- task_03 - Getting two arbitrary sets of numbers through a POST request and combining them into one set in such a way that the resulting set contains all the numbers from the first set and such numbers from the second set that are not in the first.
- task_04 - Receiving (optionally) an arbitrary string via a POST or GET request and rearranging the words in it in reverse order.
- task_05 - Processing an arbitrary multidimensional array in such a way that all integers are multiplied by two, all fractions are rounded to hundredths, all strings are converted to uppercase.

_______________________________________________________________________________________

### :heavy_check_mark: Lab 4 - Typical operations in PHP using OOP
- task_01 - Create a FormBuilder class that will allow you to form an HTML form.
- task_02 - Create a SafeFormBuilder class that will inherit from the FormBuilder class. The class will analyze the superglobal arrays $_POST and $_GET and generate a default value for the corresponding fields.
- task_03 - Create a Logger class that, when creating an object, will allow you to specify whether to display a message on the screen or in a file, and will also add a date and time to each message.
- task_04 - Create a SmartDate class that, when creating an object, will receive a date and for this date will determine: whether this day is a weekend; the distance in specified units of time between this day and today; whether the year to which the date refers is a leap year.
- task_05 - Create a CryptoManager class that will encrypt and decrypt the transmitted text. The encryption algorithm and password must be passed to the constructor.

_______________________________________________________________________________________

### :heavy_check_mark: Lab 5 - Application of typical PHP functions
- task_01 - Determine the age of a person (by date of birth) up to the day.
- task_02 - Determine the total volume of files in the specified directory (and subdirectories).
- task_03 - Convert a multidimensional array to a one-dimensional one with the elimination of duplicates.
- task_04 - Calculate how many times each letter occurs in the text.
- task_05 - Establish a connection with MySQL, determine the version.

_______________________________________________________________________________________

### :heavy_check_mark: Lab 6 - Trivial PHP Web applications
- task_01 - The file manager that allows you to upload files to the server, view the list of downloaded files, download files from the server, delete files on the server.
- task_02 - The authentication system for the file manager (from task 1) that allows users to log in using logins and passwords stored on the server in a text file.
- task_03 - Modification of the authentication system (from task 2), using logins and passwords stored in a database (managed by MySQL).

_______________________________________________________________________________________

### :heavy_check_mark: Lab 7 - Interaction with external applications using PHP
- task_01 - The image extraction application that receives a URL and saves all images available at this address to the specified directory on the local disk.
- task_02 - The modified image extraction application that receives a URL and then analyzes this page and its subpages, forming a local catalog of images.
- task_03 - The application for aggregating weather data, which will collect the weather forecast for tomorrow for the specified city from at least five different weather sites and output an average temperature forecast.
