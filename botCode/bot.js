// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var Twitter = new twit(config);


// FAVORITE BOT====================

// find a random tweet and 'favorite' it
var favoriteTweet = function(){  
  var params = {
      screen_name: 'realDonaldTrump',
      count: 10,
//      q: '#aprilfools, #aprilfoolsday',  // REQUIRED
//      result_type: 'recent', //recent tweets only.
      //lang: 'en'
  }
  
  //console.log("Params: " + params.q);
  // find the tweet
  Twitter.get('statuses/user_timeline', params, function(err,data){

    // find tweets
      //console.log(data);
    var tweet = data; //.statuses for actual tweets. 
    //console.log(tweet);
      
      
    for(var result in tweet) {
        console.log("Resulting text: " + tweet[result].text);
        console.log("Created At: " + tweet[result].created_at);
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