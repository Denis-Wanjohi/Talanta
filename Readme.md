# Talanta

## About the Project

Talanta is a web application built using HTML, CSS, JavaScript, PHP, and MySQL. It's designed to provide a platform for managing and tracking scores in a competition.

## Getting Started

To get Talanta up and running on your local machine, follow these steps.

### Prerequisites

You'll need a web server environment that supports PHP and MySQL. **XAMPP** is recommended as it bundles Apache, MySQL, PHP, and Perl.


### Installation

#### Clone the repository

Clone the repo first.

If you don't have a repository yet, manually place the project files into your XAMPP's `htdocs` directory.

#### Start XAMPP

Launch the XAMPP control panel and start the **Apache** and **MySQL** modules.

#### Database Setup

1. Open your web browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Create a new database named `talanta`.
3. Import the database schema:
    - Locate `talanta.sql` in the database folder.

#### Project Placement

- Navigate to your XAMPP's `htdocs` directory (e.g., `C:\xampp\htdocs\` on Windows).
- Place the cloned `talanta` project folder inside `htdocs`.

#### Configuration

- update the `db.php` with your database configurations.

## Usage

Once installed, access Talanta by navigating to [http://localhost/talanta/scoreboard](http://localhost/talanta/scoreboard) in your web browser.

- **User Interaction:** All public users can only see the scorebaord inteface.
- **Admin Interaction:** [http://localhost/talanta/admin](http://localhost/talanta/admin).
- **Key Features:** 
  - View all the participants and judges
  - Add new judges.
  - clicking on the cards will shift the data on the screen between the judges and particiants.

- **Judges Interaction:** [http://localhost/talanta/judges](http://localhost/talanta/judges).
Use emails (tom@gmail.com,jerry@gmail.com and tommy@gmail.com) with password (password). Any of those can give you access.
- **Key Features:** 
  - All must login first
  - Can add points (1 - 10)
  - clicking on the user will redirect to where marks are to be entred. 

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- XAMPP (Local Server Environment)

## Assumptions made
- All users are pre-registered.
- There are only three judges in the application.
- There is only one admin (login skipped)
- The UI is made as basic as possible just to meet the requirements (Can be made better for visuals)
- Password hashing was skipped jsut to bring the flow of the application.

## Design Choice
- The application is minimalistic in all aspect as to bring and MVP that is from the UI , the functionalities and the database.
- **The database**
Has four tables  admin,judge,participants and a score table.
Each user has a unique identfies ie judge - j#01 participant - p#01.
The relation of the table only occur between the participants and the score table and judges with the score table as well.

## Extra Features 
- If time allowed some of the advancement i would have made are
    - **Session Management**
    with the currect technologies expecially in php like Laravel I would have  implemented a clear and sustatnable sessions with the application.
    - **Authentication**
    Again on Laravel ,I would leverage the secure authentication packages to make the application more secure
    - **Real time Update**
    Laravel Reverb would definelty bring out the seamless updatee.
    - **User interface**
    A well crafted and appealing visual for the scoreboards , judges and the admins views.