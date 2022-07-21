# PHP Developer Position (Laravel)

## Project description:

A simple job board where users can post their jobs and send a response to other jobs.

We expect to see the following models:
1. User - user, a default User model, shipped by Laravel framework
2. job vacancy - a model containing a title and description of the vacancy.
3. Response - a model for job vacancy responses
  
## Requirements:

### Basic system methods:
1. Any user can post a new job vacancy.
2. A user cannot post more than two job vacancies per 24 hours.
3. Any user can send a response to job vacancies posted by other users.
4. Every user can accumulate up to 5 coins.
5. Every user gets new coins every 24 hours. (The amount of cash should be configurable)
6. Users cannot send two or more responses to the same job vacancy.
7. A user can like a job vacancy or another user.
8. To post a job vacancy, a user has to pay two coins and send a response one coin.
   
### Notification system:
 - Once a new response has been gotten, an email has to be sent to the job vacancy creator.
 - The email has to contain the following details (the job vacancy title, the user's name who sent a response, the total number of responses
    sent since the job vacancy was posted, and the date when the answer was sent)
 - The system should prevent sending more than one email per hour for the same job vacancy.
    Rest API:
    Implement rest API endpoints for achieving the following needs:
 - Authenticated users and guests can fetch a list of job vacancies.
 - A list of job vacancies can be sorted by date of creation and by responses count; the list can be filtered by tags and date of creation (day,
     week, month)
 - Authenticated users and guests can fetch a single job vacancy.
 - Only authenticated users can create a job vacancy.
 - Only owners can update their job vacancies.
 - Only owners can delete their job vacancies (use soft delete)
 - Only authenticated users can send a job vacancy response.
 - Responses can be deleted only by their creators.
 - A user can fetch liked job vacancies, and users
    
### Testing:
 - Implement feature tests for business methods.

### Environment requirements:
- PHP 8
- Compliance with PSR-2 code style. (php_cs.dist.php file included)
- Authorization via Laravel Passport, Laravel Sanctum or JWT
- Upload each milestone to your public GitHub account so that we can see the application's progress.
- Docker ready

## Installation
- `git@github.com:zhilinskiy/simple-job-board-laravel-api.git`
- configure env variables in `docker-compose.yaml` if necessary
- `docker-compose up -d`
- `docker-compose exec app composer i`
