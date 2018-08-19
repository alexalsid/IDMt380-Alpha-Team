<?

/* vars to hold json data from json file */
$userFile = file_get_contents('./json/user.json');
$userData = json_decode($userFile, true);
$username = $_POST['username'];

/* var to hold temp value for testing loading and saving */
$currentUser = "ws392";


/* function for testing basic sign up */
function signUp(){
// echo "--------------- Testing Sign Up -----------------\n";

    global $userData;

    // temporary new user info to be tested
    // you can change to test more
    $newUsername =  "dfe73";
    $newPassword = "pass1234";

    foreach($userData as $user){   
        if($newUsername == $user['username']){
            echo "Already existing user. Please try another username.\n";
        }else if($user['user_id'] == sizeof($userData)-1){
            // create array of new user information
            // these will be data you get from form
            $newUser = array(
                'user_id' => sizeof($userData), // since index of array is 0 based, current size of array will be the index for new entry
                'username' => $newUsername,
                'password' => $newPassword,
                'avatar' => 'snake', // it will be path to avatar img
                'saved_work' => array() // empty for first time user = no saved work
            );

        // push new user info to the current user data
        array_push($userData,$newUser);
        
        // update json file with updated array of user info
        $newUserData = json_encode($userData, JSON_PRETTY_PRINT);
        file_put_contents('./json/user.json', $newUserData);

        echo "You have successfully signed up.\n";
        }
    }
    echo "\n\n";
<<<<<<< HEAD
}; //end sign up function 

// Function for user login

function login() {

    global $userData;

    
    $password = $_POST['password'];

    foreach($userData as $user){

    /* checking to see if username exists and if password matches */

    if ($username == $user['username'] && $password == $user['password'])
    {   
        // loads saved work for the current user
        $currentUser = $username;

        echo "you have successfully signed in.\n";

        loadSavedWork($currentUser);

        } else {

            //login failed, this should trigger state change in UI

            $currentUser = NULL;
        }
    }

};


=======
}
>>>>>>> upstream/master

/* function for testing loading user saved work */
function loadSavedWork(){
    // echo "--------------- Testing Loading Saved Work -----------------\n";

    global $userData;

<<<<<<< HEAD
    $username = $_GET['username'];
    foreach ($userData as $user) {

        if ($username == $user['username'])

        $currentUser = $user;
        $currentUserIndex = $user['user_id'];
};

    echo $currentUserIndex . "\n";
    echo 'saved work will display here';
=======
    // get index for current user object
    $currentUser = "ws392";
    $currentUserIndex = findIndex($currentUser);
    $user = $userData[$currentUserIndex];
>>>>>>> upstream/master

    foreach($user['saved_work'] as $work){
        echo "saved_id: " . $work['saved_id'] . "\n";
        echo "saved_source: " . $work['saved_source'] . "\n\n"; 
    }
    echo "\n";
}

/* function for testing saving */
function saveWork(){
    // echo "--------------- Testing Saving -----------------\n";

    global $userData;

    $username = $_GET['username'];

    // temporary values for saved work to be tested
    // and this will be retreived from data and stored within JS or something
    // savedId will be index of object in saved work
    $savedId = null;
    $newSource = "Change this to see if saved";

    // get index for current user object
    $currentUser = "ppl980";
    $currentUserIndex = findIndex($currentUser);

    // get saved work array from current user object
    //$user = $userData[$currentUserIndex];
    $savedWork = $userData[$currentUserIndex]['saved_work'];

    // for this we will say fresh work have null as savedId 
    // but we need to figure something that will work with HTML and JS
    if(is_null($savedId)){
        $newWork = array(
            'saved_id' => sizeof($savedWork),
            'saved_source' => "Newly saved work"
        );
        array_push($savedWork,$newWork);
        $userData[$currentUserIndex]['saved_work'] = $savedWork;
    }else{
        $savedWork[$savedId]['saved_source'] = $newSource;
        $userData[$currentUserIndex]['saved_work'] = $savedWork;
    }

    // update json file with updated array of user info
    $newUserData = json_encode($userData, JSON_PRETTY_PRINT);
    //print_r($newUserData);
    file_put_contents('./json/user.json', $newUserData);

    // echo "You have successfully saved your work.";

    echo "\n\n";
}

/* function that will return the index of current user */
function findIndex($currentUser) {
    global $userData;

    $index = 0;
    foreach($userData as $user){ 
        if($user['username'] == $currentUser){
            return $index;
        }
        $index++;
    }
}





/* run functions */
signUp();
loadSavedWork();
saveWork();


?>