pipeline {
    agent any
    stages{
        stage("verificacion") {
            steps {
                sh '''
                 docker version
                 docker info
                 docker compose version
                '''
            }
        }
    }
}