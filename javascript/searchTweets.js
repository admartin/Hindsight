/**
 * Created by Michael Kovalsky on 4/9/2017.
 */


function displayTweets() {


    var username = $("#username").val();

    alert("Username is: " + username);


    $.get("../php/displayTweets.php", {

        },
        function (data) {
           alert(data);
           $("#resultArea").html(data);

        }
    );
}