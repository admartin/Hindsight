/**
 * Created by Michael Kovalsky on 4/9/2017.
 */


function displayTweets() {

    $.get("../php/displayTweets.php", 
        function (data) {
          
           $("#resultArea").html(data);

        }
    );
}