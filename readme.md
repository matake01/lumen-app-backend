# Full-Stack App Boilerplate (Continuous Integration & AWS)

The most perfect boilerplate project for prototyping and/or start-ups. A highly scalable and easy-to-use  full-stack app using React/Redux on the Front-End and Laravel/Lumen (optimized for Microservices) in the Back-End.

This boilerplate is developed with easy-to-delivery in mind, using CircleCI for automatization of the build, ship and run processing. The default distribution platform is AWS/Elastic Beanstalk - but feel free to change it to something that matches your needs better.

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

## Techniques used

* [React/Redux](https://github.com/reactjs/react-redux)
* [Laravel/Lumen](https://lumen.laravel.com/)
* [Docker](https://www.docker.com/)
* [CircleCI](https://circleci.com/)
* [Redis (for caching)](https://redis.io/)
* [MySQL](https://www.mysql.com/)
* [AWS Elastic Beanstalk](https://aws.amazon.com/elasticbeanstalk/)
* [AWS S3 Storage](https://aws.amazon.com/s3‎)
* [Amazon RDS](https://aws.amazon.com/rds/)

## Questions?

Feel free to send an email: [zegoffinator@gmail.com](zegoffinator@gmail.com)
