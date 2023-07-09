pipeline {
    agent any
    
    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/setmehemg/arq-software-uni.git'
            }
        }
        
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t henriquemg/gcs-laravel:latest .'
            }
        }
        
        stage('Run Dev Environment') {
            steps {
                sh 'docker compose -f docker-compose.dev.yml -p dev up -d'
            }
        }
        
        stage('Execute Tests') {
            steps {
                sh 'docker exec eventos-dev php artisan migrate --force'
                sh 'docker exec eventos-dev php artisan db:seed --class=EventosTableSeeder'
                sh 'docker exec -t eventos-dev php artisan test'
            }
        }
        
        stage('Deploy to Docker Hub') {
            steps {
                script {
                        sh 'docker login -u henriquemg -p 12.Dv9456l'
                        sh 'docker push henriquemg/gcs-laravel:latest'
                    }
            }
        }
    }
}