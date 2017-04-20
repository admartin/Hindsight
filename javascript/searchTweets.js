/**
 * Created by Michael Kovalsky on 4/9/2017.
 */


function displayTweets() {

    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }
    });

    $.get("../php/displayTweets.php",

        function (data) {
           $("#results").html(data);

        }
    );
}