pipeline {
    agent any

    stages {


        stage('Build Docker Images') {
            steps {
                script {
                    // Build Nginx image
                     sh 'docker-compose build php'
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
