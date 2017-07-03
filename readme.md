# A Full-Stack App Boilerplate (Continuous Integration & AWS)

A highly scalable and easy maintainable full-stack app using React/Redux on the Front-End and Laravel/Lumen (optimized for Microservices) in the Back-End. A perfect boilerplate project for Prototyping AND/OR start-ups.

This boilerplate is developed with super-easy-delivery in mind, using CircleCI for automatization of the build and deployment processing. The default distribution platform is AWS Elastic Beanstalk, but feel free to change it to something that matches your needs better.

## CI/CD Flow description

1. The developer commits a change to the repository
2. CircleCI detects the commit and initiates a new build
- 2a. Builds a new Docker image.
- 2b. Performs unit tests located in the 'tests' folder.
- 2c. Performs some CURL requests against the Docker container.
3. If the tests passes CircleCI initiates the deployment script
- 3a. Pushes the new Docker version to the DockerHub.
- 3b. Creates a new Elastic Beanstalk version
- 3c. Copies the new versio to AWS S3
- 3d. Creates an application version at Elastic Beanstalk
- 3e. Updates Elastic Beanstalk to the new version

## Techniques used

React/Redux
Laravel/Lumen
Docker
CircleCI
Redis (Cache)
MySQL
AWS Elastic Beanstalk
AWS S3 Storage
AWS RDS

## Questions?

Feel free to send an email: zegoffinator@gmail.com
