// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var Twitter = new twit(config);


// FAVORITE BOT====================

// find a random tweet and 'favorite' it
var favoriteTweet = function(){  
  var params = {
      q: '#aprilfools, #aprilfoolsday',  // REQUIRED
      result_type: 'recent', //recent tweets only.
      lang: 'en'
  }
  // find the tweet
  Twitter.get('search/tweets', params, function(err,data){

    // find tweets
    var tweet = data.statuses;
    
      
      
    for(var result in tweet) {
        console.log("Resulting text: " + tweet[result].text);
    }  
      
    //console.log(tweet);
    console.log("*********End of One Interval*********")    
  });
}
// grab & 'favorite' as soon as program is running...
favoriteTweet();  

// 'favorite' a tweet in every 1 minute
setInterval(favoriteTweet, 60000);

// function to generate a random tweet tweet
function ranDom (arr) {  
  var index = Math.floor(Math.random()*arr.length);
  return arr[index];
};