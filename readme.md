# Message App Backend

A simple event-driven and container-based app with support for APIs, JWT Auth and distribution at AWS under the Continuous Integration/Delivery principle.

The most perfect boilerplate project for prototyping and/or start-ups.

This projected is produced with easy-delivery in mind, using CircleCI for automatization of the build, ship and run cycle. The default platform for distribution is AWS (Elastic Beanstalk) - but feel free to change it to something that matches your needs better.

## CI/CD Flow description

```
1. The developer commits a change to the repository
2. CircleCI detects the commit and initiates a new build
- 2a. Builds a new Docker image.
- 2b. Performs unit tests located in the 'tests' folder.
- 2c. Performs some CURL requests against the Docker container to see if it behaves as we want.
3. If the tests passes CircleCI initiates the deployment
- 3a. Pushes the new Docker version to the DockerHub.
- 3b. Creates a new Elastic Beanstalk version.
- 3c. Copies the new version to AWS S3.
- 3d. Creates an application version at Elastic Beanstalk.
- 3e. Updates Elastic Beanstalk to the new version.
```

## Application Techniques

* [Laravel/Lumen](https://lumen.laravel.com/)
* [JWT Auth](https://github.com/tymondesigns/jwt-auth)
* [Dingo](https://github.com/dingo/api)
* [Redis Client](https://github.com/nrk/predis)
* [Sentry](https://sentry.io/)

## Distribution Techniques

* [Docker](https://www.docker.com/)
* [CircleCI](https://circleci.com/)
* [Redis (for caching)](https://redis.io/)
* [MySQL](https://www.mysql.com/)
* [AWS Elastic Beanstalk](https://aws.amazon.com/elasticbeanstalk/)
* [AWS S3 Storage](https://aws.amazon.com/s3‎)
* [Amazon RDS](https://aws.amazon.com/rds/)

## Questions?

Send me a message; [zegoffinator@gmail.com](zegoffinator@gmail.com)
