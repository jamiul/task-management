# Task Management

Develop a RESTful API for a Task Management application using Laravel. The application should allow users to:

Create a task.
Retrieve a list of tasks.
Mark a task as completed.
Delete a task.
Requirements
Endpoints:

POST /tasks - Create a new task.
Request: { "title": "Task Title", "description": "Task Description" }
Response: Task details, including a unique id.
GET /tasks - Retrieve a list of all tasks.
Response: Array of tasks, with fields like id, title, description, status (pending/completed), and created_at.
PUT /tasks/{id} - Mark a task as completed.
Response: Updated task details.
DELETE /tasks/{id} - Delete a task.
Response: Success message.
Database:

Use Laravel’s migrations to create a tasks table with the following fields:
id (integer, primary key)
title (string, required)
description (text, optional)
status (string, default: pending)
created_at and updated_at (timestamps)
Business Logic:

Validate inputs (e.g., title should not be empty).
Handle cases where a task ID does not exist (return a proper error response).

Bonus Points:
Add API authentication using Laravel Sanctum or Passport.
Implement unit tests for the API endpoints.

Deliverables:
A public GitHub repository with the Laravel project.
Clear instructions in a README.md file on:
How to set up and run the project locally.
How to test the API endpoints (e.g., using Postman or Curl).
A sample .env.example file for environment variables.
Evaluation Criteria
Code Quality:

Follows Laravel best practices.
Uses proper MVC architecture.
Clean, readable, and commented code.
Functionality:

All endpoints work as expected.
Proper error handling.
Bonus (optional but a plus):

API authentication.
Comprehensive unit tests.

## Run Locally

Clone the project

```bash
git clone https://github.com/jamiul/task-management.git
```

Go to the project directory

```bash
cd task-management
```

Setup the server

```bash
./docker/setup.sh
```

Start the server

```bash
./docker/run.sh
```

Stop the server

```bash
./docker/stop.sh
```

Run the all test

```bash
./docker/test.sh
```