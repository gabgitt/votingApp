
<?php
include ('functions.php');
//connect to database

mysql_connect('localhost','root','eminence') or die("cant connect to the database");
mysql_select_db('Voting') or die('cant select the required database');
//check if user is trying to signUp
if($_POST['submit']=='signUp'){
    if(empty($_POST['surname'])){
        //surname field cant be empty
    }elseif(empty($_POST['lastName'])){
        //lastName field can not be empty
    }elseif(empty($_POST['matric_number'])){
        //matric_number field cant be empty
    }elseif(empty($_POST['department'])){
        //you need to choose a department
    }elseif(empty($_POST['level'])){
        //level field cant be empty
    }elseif(empty($_POST['username'])){
        //username field cant be empty
    }elseif(empty($_POST['password1'])){
        //password field cant be empty
    }elseif(empty($_POST['password2'])){
        //print 'Please confirm your password first';
    }else{
        if($_POST['password1']!=$_POST['password2']){
            //print 'Guy,check your password again.';
            echo('reconfirm your password');
        }else{
            //check if a row with surname, matric_number and level exists
            $surname = strtoupper($_POST['surname']);
            $matric_number = strtoupper($_POST['matric_number']);
            $level = $_POST['level'];

            $check_query = "SELECT * FROM students WHERE
                            level = '$level' AND
                            name LIKE '$surname%' AND
                            matric_number = '$matric_number'";

            $result = mysql_query($check_query) or die('There is error in the query');

            if(mysql_num_rows($result)!=0){
                //successful registration,create account for the person
                //get and store useful details
                $department = getDepartment($_POST['department']);
                $last_name = $_POST['lastName'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password =  $_POST['password1'];

                $insert_query = "INSERT INTO
                                voters(fname,lname,level,email,username,password,account_created_on,department)
                                VALUES ('$surname','$last_name','$level','$email','$username','$password','NOW()','$department')";
                mysql_query($insert_query) or die('Error while inserting');
                $msg= 'You are a student ' ;
            }else{
                //print 'We currently do not have your studentship details in our database.Contact the administrator.';
                $msg = 'There are still some bugs to fix here';
            }
        }
    }

//    $msg= 'success';
}
//check if user is trying to signIn
elseif($_POST['submit']='signIn'){
    if(empty($_POST['username'])){
        //username field must not be empty
    }elseif(empty($_POST['password'])){
        //password field must not be empty
    }else{
        //check if a pair of username and password exists in the database
        if($exists){
            //grant user access to his or her home page
        }else{
            //print 'username or password is incorrect';
        }
    }

}
//confront users neither doing signIn nor signUp but trying to do his/her shits.
else{
    print 'What the hell did you just do right now?. You are a bad person';
}

?>
<html>
<head>
    <title></title>
</head>
<body>
<?php
print $msg;
//echo('Why is nothing showing');
//getDepartment($_POST['department']);
SELECT
?>
g
</body>
</html>