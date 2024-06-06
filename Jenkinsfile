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
                sshagent(['ssh-server']) {
                    sh """
                    ssh -o StrictHostKeyChecking=no root@14.225.253.204 << EOF
                    cd /path/to/your/project || true
                    rm -rf /path/to/your/project || true
                    git clone https://github.com/tomosia-hieunguyen3/laravel_11.git /path/to/your/project
                    cd /path/to/your/project
                    docker-compose up -d --build
                    docker-compose exec app php artisan migrate --force
                    EOF
                    """
                }
            }
        }
    }
}

