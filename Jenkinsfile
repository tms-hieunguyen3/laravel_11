pipeline {
    agent any

    environment {
        PATH = "/usr/local/bin:$PATH"  
    }

    stages {
        stage('Clone') {
            steps {
                git 'https://github.com/tomosia-hieunguyen3/laravel_11.git'
            }
        }

        stage('Check Docker Version') {
            steps {
                sh 'docker -v'
            }
        }

        stage('Start Services') {
            steps {
                script {
                    sh 'docker-compose up -d --build'
                }
            }
        }

        stage('Deploy to Server') {
            steps {
                sshagent(['ssh-vps']) {
                    // some block
                }
            }
        }
    }
}

