/**
 * Created by Michael Kovalsky on 4/9/2017.
 */


function displayTweets() {

    $("#graphResult").hide();
    $.get("../php/displayTweets.php", 
        function (data) {
            alert(data);
           $("#resultArea").html(data);

        }
    );
}