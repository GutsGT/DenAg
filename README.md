<h1 align="center">
<br>
DenAg
</h1>

<p align="center">Web system design for complaints by agglomeration of Covid-19.</p>

<p align="center">
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License MIT">
  </a>
</p>

<hr />

## Features

These are the features I used in developing this project.

- **Laravel** — Open-source PHP web framework
- **MySQL** — Database management system
- **Bootstrap** — Web framework for responsive websites
- **Google Charts** — Google API for creating graphics

## Getting started

Clone the project with the following command:

```sh
git clone https://github.com/GutsGT/DenAg.git
```
Install dependencies, create .env file and generate your key

```sh
composer install

cp .env.example .env

php artisan key:generate
```
Create the database and update the .env and then migrate the tables.

```sh
php artisan migrate
```

## How to contribute
Do you want to contribute to the project? Just follow these instructions:

- Fork this repository;
- Clone your repository;
- Create a branch with your feature:
`
git checkout -b my-feature
`;
- Commit your changes:
`
git commit -m 'feat: My new feature'
`;
- Push to your branch:
`
git push origin my-feature
`;
- Come in Pull Requests from the original project and create a pull request with your commit;

After the merge of your pull request is done, you can delete your branch.

## License

This project is licensed under the MIT License - see the [LICENSE](#) page for details.