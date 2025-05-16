def call(String WORKSPACE) {
     echo "###################################################\n CODE BUILD STARTED\n###################################################"
     echo "###################################################\n BUILDING MODULE\n###################################################"
     sh """
     cd ${WORKSPACE}/modules
     chmod +x ../gradlew
     ../gradlew clean deploy
     """
     echo "###################################################\n MODULE BUILD COMPLETED\n###################################################"
     echo "###################################################\n BUILDING CLIENT-EXTENSIONS\n###################################################"
     sh """
     cd ${WORKSPACE}/client-extensions
     ../gradlew clean deploy
     """  
     echo "###################################################\n CLIENT-EXTENSIONS BUILD COMPLETED\n###################################################"
     echo "###################################################\n BUILDING THEMES\n###################################################"
     sh """
     cd ${WORKSPACE}/themes/krypton-theme
     npm install
     node_modules/.bin/gulp deploy
     """
     echo "###################################################\n THEMES BUILD COMPLETED\n###################################################"
     echo "###################################################\n CODE BUILD COMPLETED\n###################################################"
}

