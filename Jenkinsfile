pipeline {
    agent any

    stages {
        stage('Install Docker') {
            steps {
                script {
                    // Cài đặt Docker
                    sh 'curl -fsSL https://get.docker.com -o get-docker.sh'
                    sh 'sudo sh get-docker.sh'
                }
            }
        }

        stage('Build Docker Images') {
            steps {
                script {
                    // Build Nginx image
                    sh 'docker-compose build nginx'

                    // Build PHP image
                    sh 'docker-compose build php'

                    // Build PHP-batch image
                    sh 'docker-compose build php-batch'
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Stop and remove existing containers
                    sh 'docker-compose down'

                    // Start the containers
                    sh 'docker-compose up -d'
                }
            }
        }
    }

    post {
        always {
            // Clean up
            sh 'docker system prune -f'
        }
    }
}
