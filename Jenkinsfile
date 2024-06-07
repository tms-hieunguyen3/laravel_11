pipeline {
    agent any

    environment {
        PATH = "/usr/local/bin:$PATH"
    }

    stages {
        // stage('Tests') {
        //     steps {
        //         git 'https://github.com/tomosia-hieunguyen3/laravel_11.git'
        //         sh 'docker -v'
        //         // sh 'docker-compose up -d --build'
        //     }
        // }
        stage('Deploy to Server') {
            steps {
                sshagent(['ssh-vps']) {
                    sh 'docker -v'
                    sh 'mkdir text'
                }
            }
        }
    }
}

