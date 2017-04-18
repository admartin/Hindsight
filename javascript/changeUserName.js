/**
 * Created by Micahel Kovalsky on 4/18/2017.
 */


function changeUserName() {

    $.get("../php/updateUsername.php",

        function (data) {
            $("#user").html(data);

        }
    );

}