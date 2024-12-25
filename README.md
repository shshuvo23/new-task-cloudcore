# Task Management API
This is a Task Management API built using Laravel.

![Laravel](https://img.shields.io/badge/laravel-v10.10-red)
![PHP](https://img.shields.io/badge/php-%5E10.10-blue)


## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Postman Collection](#postman-collection)
- [License](#license)


## Features
- User authentication (Laravel UI/Bootstrap)
- Task CRUD operations
- Filter and sort tasks
- Database schema and Postman collection provided


## Requirements
- PHP >= ^10.10
- Composer
- MySQL
- Postman (optional)


## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/task-management.git
   cd task-management


composer install
npm install


cp .env.example .env


php artisan migrate --seed


php artisan serve



#### g) **API Endpoints**
List available API endpoints.

```markdown
## API Endpoints
| Method | Endpoint                | Description                |
|--------|-------------------------|----------------------------|
| GET    | /api/tasks              | Retrieve all tasks         |
| POST   | /api/task/create        | Create a new task          |
| PUT    | /api/task/update/{id}  | Update an existing task    |
| DELETE | /api/task/delete/{id}   | Delete a task              |


## Usage
- Use the Postman collection to test API endpoints.
- Use the web interface (if applicable) for managing tasks.


## Postman Collection
- Import `Task-Management.postman_collection.json` into Postman.


## License
This project is licensed under the MIT License.
