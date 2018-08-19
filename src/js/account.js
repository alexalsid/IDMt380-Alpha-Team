
//globals 
//json file
var xmlhttp = new XMLHttpRequest();
var url = "../src/php/json/user.json";




function loginRequest () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var userData = JSON.parse(xmlhttp.responseText);
        login(userData);
    }
};


function signupRequest() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var userData = JSON.parse(xmlhttp.responseText);
        signup(userData);
    }
};

xmlhttp.open("GET", url, true);
xmlhttp.send();


function signup(userData) {


    var newUsername = document.getElementById('new-username').value;
    var newPassword = document.getElementById('new-password').value;
    var rePassword = document.getElementById('confirm-password').value;
    var avatar = "";

    console.log(newUsername);
    console.log(newPassword);

    for (i = 0; i < userData.length; i++) {

        if(newUsername == userData[i].username)


        {
            console.log('this username already exists');
            return false;
        
        }
    
    };


    if (newPassword !== rePassword) {

        console.log('passwords do not match');
        return false;



    } else {

        console.log('ready to get data');
        var newUser = {user_id: userData.length,
                        username: newUsername, 
                        password: newPassword,
                        avatar: avatar,
                        saved_work: {} };

        var newUserStr = JSON.stringify(newUser);
        console.log(newUserStr); 
        var currentUser = "fake";
   
};

accessFeatures(currentUser);

    
}; //end signup function 




function login(userData) {

    //login info
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    console.log(username);
    console.log(password);

    for(i = 0; i < userData.length; i++) {

        if (username == userData[i].username && password == userData[i].password) 
    
        
        {
            var currentUser = userData[i].user_id
            console.log(currentUser);
            console.log('this is the user id');
            accessFeatures(currentUser);
            
        }
    
    } 
};// end login function;



function accessFeatures(currentUser) {

    loadSavedWork(currentUser);
    var saveBtn = document.getElementById('save-btn');
    saveBtn.addEventListener('click', function() {


        saveWork(currentUser);
            

        console.log(currentUser + 'saved');
  
    });
    
};

function loadSavedWork(currentUser) {

    console.log(currentUser + 'loaded');



    
};



function saveWork(currentUser) {


    console.log(currentUser + 'saved');




    
};


//btns listening
var submit = document.getElementById('submit');
var signupBtn = document.getElementById('signup-btn');


submit.addEventListener('click', function(event) {

    event.preventDefault();
    loginRequest();
    
});

signupBtn.addEventListener('click', function(event) {

    event.preventDefault();
    signupRequest();
    
});




