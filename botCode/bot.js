// Dependencies =========================
var  
    twit = require('twit'),
    config = require('./config');

var http = require("http");
var url = require("url");

var Twitter = new twit(config);


// FAVORITE BOT====================

// find a random tweet and 'favorite' it


var favoriteTweet = function(response, a, b){  
              
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
            response.write("Name: " + a + ". Text: " + tweet[result].text + "\n");
            console.log("Resulting text: " + tweet[result].text);
            console.log("Created At: " + tweet[result].created_at);
        }  

        //console.log(tweet);
          response.write("*********End of One Interval*********")
        console.log("*********End of One Interval*********")    
      });
    }

http.createServer(function(request, response) {
    
    response.writeHead(200, {"Content-Type":"text/plain"});
        var params = url.parse(request.url, true).query;
        
        var a = params.name;
        var b = parseInt(params.count);
    
    
        
        favoriteTweet(response, a, b);  
    

        // 'favorite' a tweet in every 1 minute
        setInterval(function() {
            // grab & 'favorite' as soon as program is running...
          favoriteTweet(response, a, b) 
        }, 60000);
    
    
}).listen(9090);

