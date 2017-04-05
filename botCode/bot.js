// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var Twitter = new twit(config);




// FAVORITE BOT====================

// find a random tweet and 'favorite' it
var searchTweets = function(){  
  var params = {
      q: 'since:2017-04-01',  // REQUIRED
      result_type: 'recent',
      count:'10',
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
       console.log("Posted at: " + date[1] + " " + date[2] + " " + date[5]);
       console.log("User: " + tweet[result].user.screen_name);
   }
      
  });
}
// grab & 'favorite' as soon as program is running...
searchTweets();  
// 'favorite' a tweet in every 15 minutes
setInterval(searchTweets, 900000);


