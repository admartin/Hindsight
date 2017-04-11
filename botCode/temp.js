// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var mysql = require("mysql");

var con = mysql.createConnection(
{
    
   host: "localhost",
   user: "root",
   port:"3306",
   password: "Jaljap2732!",
   dateStrings: true,
   datebase: "rawdata"
});



var Twitter = new twit(config);

con.connect(function(err) {
   if(err) {
       console.log("Sorry Fam, error connecting");
   } else {
       console.log("Connection Successful")
       searchTweets();
   }
});


// FAVORITE BOT====================

// find a random tweet and 'favorite' it
var searchTweets = function(){  
  var params = {
      q: 'since:2017-04-01',  // REQUIRED
      result_type: 'recent',
      count:'1',
      lang: 'en'
  }
  // find the tweet
  Twitter.get('search/tweets', params, function(err,data){

    // find tweets
    var tweet = data.statuses;

      //console.log(tweet);
   for(var result in tweet) {
       console.log("text: " + tweet[result].text);
       var created_at = tweet[result].created_at;
       var date = created_at.split(" ");
       var month = date[1];
       
       var sqlDate = date[5] + "-" + monthToInt(month) + "-" + date[2]; 
       
       
       var data = {
         tweet:  tweet[result].text,
         posted: sqlDate,
         Category_idCategory: 1,
         User_idUser: 1 //tweet[result].user.screen_name 
       };
       
       con.query("use rawdata");
       con.query('INSERT INTO tweet SET ?', data, function(err, rows) {
          if(err) throw err;
           else {
               console.log("Data from DB");
               console.log(rows);
           }
       });
       
       console.log("Posted at: " + date[1] + " " + date[2] + " " + date[5]);
       console.log("Converted Date: " + monthToInt(month));
       console.log("User: " + tweet[result].user.screen_name);
   }
      
  });
}
// grab & 'favorite' as soon as program is running...
searchTweets();  
// 'favorite' a tweet in every 15 minutes
setInterval(searchTweets, 900000);


function monthToInt(month) {
    
    //We will return a string representation of the month
    //using numbers in order to insert it into our SQL table. 
    
    
    var result = "";
    
    switch(month) {
        case "Jan":
            console.log("Janaury: 01");
            result = "01";
            break;
        case "Feb":
            console.log("February: 02");
            result = "02";
            break;
        case "Mar":
            console.log("March: 03");
            result = "03";
            break;
        case "Apr":
            console.log("April: 04");
            result = "04";
            break;
        case "May":
            console.log("May: 05");
            result = "05";
            break;
        case "Jun":
            console.log("Jun: 06");
            result = "06";
            break;
        case "Jul":
            console.log("Jul: 07");
            result = "07";
            break;
        case "Aug":
            console.log("August: 08");
            result = "08";
            break;
        case "Sept":
            console.log("September: 09");
            result = "09";
            break;
        case "Sep":
            console.log("September: 09");
            result = "09";
            break;
        case "Oct":
            console.log("October: 10");
            result = "10";
            break;
        case "Nov":
            console.log("November: 11");
            result = "11";
            break; 
        case "Dec":
            console.log("December: 12");
            result = "12";
            break;
    }
    
    return result;
}
