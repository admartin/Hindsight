<?php

/**
 *
 * Class with only static methods which will be used to return our array of categories.
 *
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/14/2017
 * Time: 12:16 PM
 */
class UserCategories
{
    private static $sports = array("football", "NFL", "NCAA", "Superbowl", "Falcons", "Dodgers", "Bulldawgs", "Georgia Bulldawgs", "Yellow Jackets", "NFL", "SEC"
    , "basketball", "NBA", "March Madness", "baseball", "MLB", "world series", "tennis", "soccer", "NASCAR", "olympics", "golf", "Augusta");
    private static $politics = array("Russia", "Syria", "France", "Belgium", "London", "Moscow", "Washington", "North Korea", "China", "Beijing", "Nuclear", "Nuclear War",
        "Terrorism", "War on Terror", "War on Drugs", "Police Brutality", "Senate", "House", "Duma", "Communist", "Communism", "Socialist", "Fascist", "Trump", "Putin",
        "Kim Jong Un", "CIA", "WikiLeaks", "Russian Hacking", "Elections", "Hillary Clinton", "Clinton", "Donald Trump", "President", "POTUS", "Debate", "CNN", "Fox News",
        "BBC", "Liberal", "Conservative", "State of the Union", "Homosexuality", "Black Lives Matter", "BLM", "Obama");
    private static $entertainment = array("TV", "MTV", "HBO", "Game of Thrones", "GOT", "Sex", "Sexy", "Fashion", "Marriage", "SNL", "Reddit", "AMA", "Golden Globes", "Music", "Billboard Music Awards",
        "BMA", "Oscars", "Miss Universe", "Pageant", "Rap", "Hip-Hop", "Hip Hop", "RNB", "R&B", "Classic Music", "Metal", "Elvis", "YouTube");
    private static $technology = array("Microsft", "Google", "Apple", "Toshiba", "iPhone", "Android", "Windows", "Mac", "iPad", "Surface", "Tablet", "Yahoo", "Verizon", "Samsung",
        "Uber", "Adobe", "Photoshop", "AI", "Self Driving Cars", "Video Games", "LG", "OSX", "Windows 10");
    private static $food = array("Wendys", "McDonalds", "Wendy's", "Chic Fil A", "Chic-Fil-a", "Burger", "TGI", "BBQ", "Grilling", "Wine", "Tasty", "Yum", "IHOP", "Pancakes", "Pizza", "Cake"
        ,"Baking");
    private static $other;
    private static $animals = array("Cat", "Dog", "Cats", "Dogs", "Doggo", "Pupper", "Pupperino", "Puppy", "Kitten", "Parrot");



    public static function getAnimals() {
        self::$animals = array("Cat", "Dog", "Cats", "Dogs", "Doggo", "Pupper", "Pupperino", "Puppy", "Kitten", "Parrot");
        return self::$animals;
    }

    /**
     * @return array
     */
    public static function getSports()
    {
        self::$sports = array("football", "NFL", "NCAA", "Superbowl", "Falcons", "Dodgers", "Bulldawgs", "Georgia Bulldawgs", "Yellow Jackets", "NFL", "SEC"
        , "basketball", "NBA", "March Madness", "baseball", "MLB", "world series", "tennis", "soccer", "NASCAR", "olympics", "golf", "Augusta");
        return self::$sports;
    }

    /**
     * @return array
     */
    public static function getPolitics()
    {
        self::$politics = array("Russia", "Syria", "France", "Belgium", "London", "Moscow", "Washington", "North Korea", "China", "Beijing", "Nuclear", "Nuclear War",
            "Terrorism", "War on Terror", "War on Drugs", "Police Brutality", "Senate", "House", "Duma", "Communist", "Communism", "Socialist", "Fascist", "Trump", "Putin",
            "Kim Jong Un", "CIA", "WikiLeaks", "Russian Hacking", "Elections", "Hillary Clinton", "Clinton", "Donald Trump", "President", "POTUS", "Debate", "CNN", "Fox News",
            "BBC", "Liberal", "Conservative", "State of the Union", "Homosexuality", "Black Lives Matter", "BLM", "Obama");
        require_once self::$politics;
    }

    /**
     * @return array
     */
    public static function getEntertainment()
    {
        self::$entertainment = array("TV", "MTV", "HBO", "Game of Thrones", "GOT", "Sex", "Sexy", "Fashion", "Marriage", "SNL", "Reddit", "AMA", "Golden Globes", "Music", "Billboard Music Awards",
            "BMA", "Oscars", "Miss Universe", "Pageant", "Rap", "Hip-Hop", "Hip Hop", "RNB", "R&B", "Classic Music", "Metal", "Elvis", "YouTube");
        return self::$entertainment;
    }

    /**
     * @return array
     */
    public static function getTechnology()
    {
        self::$technology = array("Microsft", "Google", "Apple", "Toshiba", "iPhone", "Android", "Windows", "Mac", "iPad", "Surface", "Tablet", "Yahoo", "Verizon", "Samsung",
            "Uber", "Adobe", "Photoshop", "AI", "Self Driving Cars", "Video Games", "LG", "OSX", "Windows 10");
        return self::$technology;
    }

    /**
     * @return array
     */
    public static function getFood()
    {
        self::$food = array("Wendys", "McDonalds", "Wendy's", "Chic Fil A", "Chic-Fil-a", "Burger", "TGI", "BBQ", "Grilling", "Wine", "Tasty", "Yum", "IHOP", "Pancakes", "Pizza", "Cake"
        ,"Baking");
        return self::$food;
    }

    /**
     * @return array
     */
    public static function getOther()
    {
        return self::$other;
    }


    public static function decideCategory($tweets) {

        $tweet = $tweets;

        if(in_array($tweet, self::$food)) {
            echo "\nOur " . $tweet . " is under food\n";
        }
        else if(in_array(strtolower($tweet), array_map("strtolower", self::$politics))) {
            echo "\nOur " . $tweet . " is under politics\n";
        }
        else if(in_array($tweet, self::$technology)) {
            echo "\nOur " . $tweet . " is under Technology\n";
        }
        else if(in_array($tweet, self::$entertainment)) {
            echo "\nOur " . $tweet . " is under Entertainment\n";
        }
        else if(in_array($tweet, self::$sports)) {
            echo "\nOur " . $tweet . " is under Sports\n";
        }
        else if(in_array($tweet, self::$animals)) {
            echo "\nOur " . $tweet . " is under Animals\n";
        }
        else {
            echo "\nOur " . $tweet . "Is Under Other\n";
        }
    }
}