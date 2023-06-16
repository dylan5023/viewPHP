<?php


class Page {


    public static function getPageHeader() {
        $htmlHeader = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
        ';
        return $htmlHeader;
    }


    public static function getPageFooter() {
        $htmlPageEnd = '
                </body>
            </html>
            ';
        return $htmlPageEnd;
    }   

    public static function successMessage() {

        $message = '
            <div class="alert alert-success" role="alert">
                New User has successfully
            </div>
        ';
        return $message;
    }

    public static function userTable($userList) {
        $userTable = '
            <table class = "table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">EmployeeId</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach ($userList as $user) {
                        $userTable .= self::buildUserRow($user);
                    }
                    $userTable .= '
                </tbody>
            </table>';
        return $userTable;

    }

    public static function buildUserRow($newUser){
        $row = '
            <tr>
                <td>'.$newUser->getEmployeeId().'</td>
                <td><a href = "dependentPage.php?fName=fName">'.$newUser->getFName().' '. $newUser->getLName().'</a></td>
                <td>'.$newUser->getEmail().'</td>
                <td>'.$newUser->getGender().'</td>
                <td>'.$newUser->getDepartment().'</td>
            </tr>
        
        ';
        return $row;
    }
    //  public static function departmentTable($departmentList) {
    //     $departmentTable = '
    //         <table class = "table table-dark table-hover">
    //             <thead>
    //                 <tr>
    //                     <th scope="col">EmployeeId</th>
    //                     <th scope="col">First Name</th>
    //                     <th scope="col">Last Name</th>
    //                     <th scope="col">User Name</th>
    //                     <th scope="col">Email</th>
    //                     <th scope="col">Age</th>
    //                     <th scope="col">Gender</th>
    //                 </tr>
    //             </thead>
    //             <tbody>';
    //                 foreach ($departmentList as $department) {
    //                     // var_dump($department[1]);   
    //                     $departmentTable .= self::buildDepartmentRow($department);
    //                 }
    //                 $departmentTable .= '
    //             </tbody>
    //         </table>';
    //     return $departmentTable;

    // }

    // public static function buildDepartmentRow($newDpartment){
    //     // var_dump($newDpartment);
    //     $row = '
    //         <tr>
    //             <td>'.$newDpartment->getDependentId().'</td>
    //             <td>'.$newDpartment->getEmployeeId().'</td>
    //             <td>'.$newDpartment->getDob().'</td>
    //             <td>'.$newDpartment->getGender().'</td>
    //             <td>'.$newDpartment->getRelationship().'</td>
    //         </tr>
        
    //     ';
    //     return $row;
    // }

}