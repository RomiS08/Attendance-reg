# IT Conference Registration System

This project is a simple registration system for an IT Conference. It's built with PHP and uses a MySQL database for storing the registration data.

## Features

- User registration: Users can register for the conference by providing their first name, last name, date of birth, email, telephone, and specialty.
- Specialty selection: The system fetches the list of specialties from the database and allows users to select their specialty when registering.
- Confirmation page: After a successful registration, users are redirected to a confirmation page where they can review their registration details.

## Installation

1. Clone the repository: `git clone https://github.com/yourusername/yourrepository.git`
2. Navigate to the project directory: `cd yourrepository`
3. Install the dependencies: `composer install`
4. Create a MySQL database and import the `database.sql` file.
5. Update the database configuration in the `db/conn.php` file.
6. Start the server: `php -S localhost:8000`
7. Open `localhost:8000` in your web browser.

## Usage

To register for the conference, fill out the form on the index page and click the "Register" button. You will be redirected to the confirmation page where you can review your registration details.

## Contributing

Contributions are welcome! Please read the [contributing guide](CONTRIBUTING.md) to get started.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE.md) file for details.
