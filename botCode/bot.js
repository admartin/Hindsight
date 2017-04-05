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
      count:'100',
      lang: 'en'
  }
  // find the tweet
  Twitter.get('search/tweets', params, function(err,data){

    // find tweets
    var tweet = data.statuses;

   for(var result in tweet) {
       console.log("text: " + tweet[result].text);
   }
      
  });
}
// grab & 'favorite' as soon as program is running...
searchTweets();  
// 'favorite' a tweet in every 15 minutes
setInterval(searchTweets, 900000);


