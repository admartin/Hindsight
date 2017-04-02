// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var http = require("http");
var url = require("url");

var Twitter = new twit(config);


// FAVORITE BOT====================

// find a random tweet and 'favorite' it

http.createServer(function(request, response) {
    var favoriteTweet = function(){  
        
        response.writeHead(200, {"Content-Type":"text/plain"});
        var params = url.parse(request.url, true).query;
        
        var a = params.name;
        var b = parseInt(params.count);
        
        var params = {
        screen_name: a,
        count: b,
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
}).listen(9090);


// function to generate a random tweet tweet
//function ranDom (arr) {  
//  var index = Math.floor(Math.random()*arr.length);
//  return arr[index];
//};