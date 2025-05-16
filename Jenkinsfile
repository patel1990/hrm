@Library("shared-library") _


pipeline {
   agent any
       environment {
        GIT_PROJECT = 'liferay'
        WORKSPACE   = '/var/lib/jenkins/workspace/Liferay-Deployment-Pipeline/liferay/constl-workspace'
        DOCKER_REGISTRY = '192969151936.dkr.ecr.ap-south-1.amazonaws.com/krypton-container-registry'
        LOCATION = '/var/lib/jenkins/workspace/Liferay-Deployment-Pipeline'
    }
    parameters {
        choice(name: 'Environment', choices: ['preprod'], description: 'Select Environment')
        choice(name: 'Operation_Type', choices: ['Deployment', 'Build With Image', 'Rollback'], description: 'Select Operation_Type Type')
    }
 stages {
       stage('Set Environment Variables') {
         steps {
	 stageDemo(GIT_PROJECT:"${env.GIT_PROJECT}",WORKSPACE:"${env.WORKSPACE}",Environment:"${params.Environment}")
	   
	 }
       }
  }
 
}
